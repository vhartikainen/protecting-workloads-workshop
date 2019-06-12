# Supercharging your Workload Defenses - Getting Started

!!! Attention
    <p style="font-size:16px;">
      For participants in the re:Inforce Builder Session, _FND305 - Supercharging your workload defenses with AWS WAF, Amazon Inspector, and AWS Systems Manager_, **you do not need to deploy the CloudFormation Stack as it has already been created. Follow the instructions in the drop down directly below for _Event Engine_.**
    </p>

??? info  "Click here if you're at an *AWS event* where the *Event Engine* is being used" 

AWS has already built the environment for you with CloudFormation.  Follow the steps below to access the environment.

	1. Navigate to the <a href="https://dashboard.eventengine.run" target="_blank">Event Engine dashboard</a>
	2. Enter your **team hash** code. 
	3. Click **AWS Console**
    4. Connect to the AWS Console via Event Engine and browse to the CloudFormation Console in the N. Virginia region (us-east-1).
	5. Move on to **[Assess phase](assess.md)**.

---

## Create or Identify Exisitng AWS account

In order to complete these workshops, you'll need a valid, usable <a href="https://aws.amazon.com/getting-started/" target="_blank">AWS Account</a>. Use a personal account or create a new AWS account to ensure you have the necessary access and that you do not accidentally modify corporate resources. Do **not** use an AWS account from the company you work for. 

!!! info "Note About Workshop and AWS Account"
    __We stronly recommend that you use a non-production AWS account for this workshop such as a training, sandbox or personal account.__

## Create an admin user

If you don't already have an AWS IAM user with admin permissions, please use the following instructions to create one:

1.  Browse to the <a href="https://console.aws.amazon.com/iam/" target="_blank">AWS IAM</a> console.
2.  Click **Users** on the left navigation and then click **Add User**.
3.  Enter a **User Name**, check the checkbox for **AWS Management Console access**, enter a **Custom Password**, and click **Next:Permissions**.
4.  Click **Attach existing policies directly**, click the checkbox next to the **AdministratorAccess**, and click **Next:review**.
5.  Click **Create User**
6.  Click **Dashboard** on the left navigation and use the **IAM users sign-in link** to login as the admin user you just created.

## Add credits (optional)

If you are doing this workshop as part of an AWS sponsored event, you will receive credits to cover the costs.  Below are the instructions for entering the credits:

1.  Browse to the <a href="https://console.aws.amazon.com/billing/home?#/credits" target="_blank">AWS Account Settings</a> console.
2.  Enter the **Promo Code** you received (these will be handed out at the beginning of the workshop).
3.  Enter the **Security Check** and click **Redeem**.

---

Click [here](build.md) to proceed to the Build Phase.
