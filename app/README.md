# waf-workshop-demo

Demo Website for re:Invent 2017 WAF Workshop. This repo contains a simple PHP backend app with a minimal set of sample pages and purposeful sloppy programming.

## Deployment

## Configuration

The demo requires the following environment variables to operate:
* **WAF_IP_SET_ID**: The AWS WAF Blacklist IPSet identifier to add trapped IP addresses to.
* **WAF_WEB_ACL_METRIC_NAME**: The AWS WAF Web ACL CloudWatch Metric Name to display request data in the chart for.
* **WAF_WEB_ACL_ID**: The AWS WAF WebACL identifier to pull sampled requests for.
* **WAF_RULE_ID**: The AWS WAF Rule identifier to pull sampled requests for.
* **SNS_TOPIC_ARN**: Amazon SNS topic ARN for the topic to publish notifications on for trapped requests.
* **HONEYPOT_URI**: The URI segment to use for the honeypot trap - use /honeypot/" if you'd like to use the server-side option included here, as opposed to an independent automation
