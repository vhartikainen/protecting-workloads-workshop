<?php

// render content
function outputContent($template = '', $output = array()) {
  // process variables
  foreach ((array)$output as $k => $v) { $template = str_replace("%%{$k}%%", $v, $template); }
	unset($output);

	// set non-caching headers
	header("Expires: 0");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	// output
	print($template);
}

// render error
function outputError($message = '') {
  // send not authorized header
	header('HTTP/1.0 500 Internal Server Error', true, 500);
	header("Expires: 0");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	// print error
	print($message . "\n");
}
