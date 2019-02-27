# Mitigating Common Web Application Attack Vectors Using AWS WAF - Build Phase

## Environment setup

To setup the workshop environment, launch the CloudFormation stack below in the preferred AWS region using the "Deploy to AWS" links below. This will automatically take you to the console to run the template.

!!! info "Note About Workshop and AWS Account"
    #### **We stronly recommend that you use a non-production AWS account for this workshop such as a training, sandbox or personal account.**

---

**US West 2 (Oregon)** &nbsp; &nbsp; &nbsp; &nbsp; 
<a href="https://console.aws.amazon.com/cloudformation/home?region=us-west-2#/stacks/new?stackName=pww&templateURL=https://s3.amazonaws.com/protecting-workloads-workshop/public/artifacts/pww-workshop-env-build.yml" target="_blank">![Deploy in us-est-2](/images/deploy-to-aws.png)</a>

---

**US East 2 (Ohio)** &nbsp; &nbsp; &nbsp; &nbsp;
<a href="https://console.aws.amazon.com/cloudformation/home?region=us-east-2#/stacks/new?stackName=pww&templateURL=https://s3.amazonaws.com/protecting-workloads-workshop/public/artifacts/pww-workshop-env-build.yml" target="_blank">![Deploy in us-east-1](/images/deploy-to-aws.png)</a>

---

1. Click ***Next*** on the Specify Template section.

2. On the Specify stack details step, update the following Parmeters:
    - Automated Scanner: __Set to true if event is AWS sponsored. Otherwise set to false.__
    - Scanner Username: __Only for AWS sponsored event. Enter the username provided by the workshop team. Otherwise leave default.__
    - Scanner Password: __Only for AWS sponsored event. Enter the password provided by the workshop team. Otherwise leave default.__
    - Trusted Network CIDR: Enter a trusted IP or CIDR range you will access the site from using a web browser. You can optain your current IP at <a href="https://ifconfig.co/" target="_blank">Ifconfig.co</a> The entry should follow CIDR notation. i.e. 10.10.10.10/32 for a single host.
    - Keep the defaults for the rest of the parameters.

3. CLick ***Next*** 

4. Click Next on the ***Configure stack options*** section.

5. Finally, acknowledge that the template will create IAM roles under Capabilities and click **Create**.

This will bring you back to the CloudFormation console. You can refresh the page to see the stack starting to create. Before moving on, make sure the stack is in a __CREATE_COMPLETE__ status. This should take ~8 minutes.

---

Click [here](./assess.md) to proceed to the Assess Phase.
