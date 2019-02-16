<?php
// set utc time
date_default_timezone_set('UTC');

// Include the SDK using the Composer autoloader
require('../vendor/autoload.php');

// set non-caching headers
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// output
print('Health check successful!');
