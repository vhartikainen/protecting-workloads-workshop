import cfnresponse
import os
import boto3
import time
import json
import datetime
import logging
import string
from random import *
from botocore.vendored import requests 
from base64 import b64decode, b64encode
from botocore.exceptions import ClientError
from six.moves.urllib.parse import quote, unquote

logger = logging.getLogger()
logger.setLevel(logging.INFO)
client = boto3.client('apigateway')
APIEP = os.environ['APIEP']
TargId = os.environ['TARGID']
UserName = os.environ['USERNAME']
PassWord = os.environ['PASSWORD']
class EncodeError(Exception):
  pass
def encode(username, password):
  if ':' in username:
      raise EncodeError
  username_password = '%s:%s' % (quote(username), quote(password))
  return 'Basic ' + b64encode(username_password.encode()).decode()
def handler(event, context):
  url = APIEP
  AuthToken = encode(UserName, PassWord)
  timestamp = int(time.time())
  headers = {'content-type': 'application/json', 'authorizationToken': AuthToken }
  logger.info('Received event: {}'.format(json.dumps(event)))
  try:
    responseData = {}
    # Assume failure unless we get 200 response
    responseStatus = cfnresponse.FAILED
    if event['RequestType'] == 'Delete':
      payload = { "Key": { "targid": {"S": TargId } }, "TableName": "waflab" }
      response = requests.delete(url, data=json.dumps(payload), headers=headers)
      responseData = {'StatusCode': response.status_code}
      responseStatus = cfnresponse.SUCCESS
    elif event['RequestType'] == 'Create' or event['RequestType'] == 'Update':
      min_char = 8
      max_char = 8
      allchar = string.ascii_lowercase + string.digits
      UUID = "".join(choice(allchar) for x in range(randint(min_char, max_char)))
      EXP = timestamp + + 12 * 60 * 60
      payload = { "Item": { "targid": {"S": TargId }, "uuid": {"S": UUID }, "stackid": {"S": StackId}, "timestamp": { "N": str(timestamp) }, "ttl": {"N": str(EXP) } }, "TableName": "waflab" }
      response = requests.post(url, data=json.dumps(payload), headers=headers)
      logger.info('Response Text: {}'.format(response.text))
      responseData = {'UUID': UUID }
      if 'deny' not in response.text:
        responseStatus = cfnresponse.SUCCESS
    else:
      responseStatus = cfnresponse.FAILED
  except ClientError as e:
    logger.error('Error: {}'.format(e))
    responseStatus = cfnresponse.FAILED
  # Log the response status
  logger.info('Returning response status of: {}'.format(responseStatus))
  # Send result to stack
  cfnresponse.send(event, context, responseStatus, responseData)