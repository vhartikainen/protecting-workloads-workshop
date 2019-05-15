# Mitigating Common Web Application Attack Vectors Using AWS WAF - Cleanup Phase


!!! info "For those who are continuing to the Host Layer round"
    __If you are only going to complete the Perimeter Layer round, do not delete any resources yet. [Continue the workshop with the Host Layer round](/host-layer/). You will perform cleanup at the end of the workshop.__

---

If you are not moving on to the next round, follow the steps below to clean up the artifacts that were created.

1. Go to the CloudFormation console and delete the stack that you created.
2. Go to the WAF console and remove the conditions from the rules that you created
2. Go to the WAF console and delete the conditions you created.
3. Go to the WAF console and delete the rules you created.


!!! info "Note about Automated Scanner"
    The automated scanner entry for your site will age out of the dashboard after several hours but you can continue to test your WAF rule set with the red team host script.