# Mitigating Common Web Application Attack Vectors Using AWS WAF - Assess Phase

In the previous Build Phase, you built a CloudFormation stack that contains
a PHP website on Amazon EC2 instances behind an application load balancer.
You are now going to assess the posture of the site and then add an AWS WAF Web ACL to your site. In this section you will do the following tasks:

1. Identify the stack you built
2. Look up the output values for your environment and test access
3. Use your Red Team Host to test for website vulnerabilities

## Identify the stack that you built

1. Go to the CloudFormation console in the same AWS region in which you created the stack in the Build Phase. You should see a list of stacks similar to the figure below. Locate the stack you created. In this documentation, the name of the stack is *pww*.  Copy this stack name into a scratch file on your workstation in case you need it later.

    ![cloudformation-stack-list](./images/assess-cloudformation-stacks.png)

## Look up the ALB endpoint

1.  Go to the stack outputs and look for the website URL stored in the **albEndpoint** output value. Test access to the site by right clicking and opening in a new tab. Note the URL for your site as this will be used throughout this workshoop module.

2.  While in the stack outputs, note the **ScannerUID** value. This Id value will be used to identify the posture of your site within the automated scanner and the associated dashboard.

3. While still in stack outputs, right click the link in **RedTeamHostSession** and open in new tab. This will launch an AWS Systems Manager Session Manager to the host you will use to perform add hock scans against your site URL. 

!!! info "AWS Systems Manager Session Manager"
    Session Manager is a fully managed AWS Systems Manager capability that lets you manage your Amazon EC2 instances through an interactive one-click browser-based shell or through the AWS CLI. Session Manager provides secure and auditable instance management without the need to open inbound ports, maintain bastion hosts, or manage SSH keys. 

## Website Scanning Environment and Tools

In order to test your AWS WAF ruleset, this lab has been configured with two scanning capabilities; a Red Team Host where you can invoke manual scanning and an automated scanner which runs from outside your lab environment. The manual scanner can be invoked on your Red Team Host by typing the following command while in the _/usr/bin_ directory:

````
python3 scanner.py http://your-alb-endpoint
````

