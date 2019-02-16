<?php
// get template and replace placeholders
$template .= file_get_contents('includes/footer.html');

// variables
$output['copyYear'] = date('Y');
