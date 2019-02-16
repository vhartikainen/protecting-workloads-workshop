<?php
// set utc time
date_default_timezone_set('UTC');

// Include the SDK using the Composer autoloader
require('../vendor/autoload.php');

// include output module
require('modules/output.php');

// start a session
session_start();

// try/catch
try {
  // make sure file parameter provided
  if (isset($_GET['form'])) {
    $file = "assets/$_GET[form]";
  } else {
    throw new Exception('Need a file to download');
  }

  // download the file
  if (file_exists($file) AND is_readable($file)) {
      header("Content-Description: File Download");
      header("Content-Type: application/octet-stream");
      header("Content-Disposition: attachment; filename=\"$_GET[form]\"");
      header("Expires: 0");
      header("Cache-Control: must-revalidate");
      header("Pragma: public");
      header("Content-Length: " . filesize($file));
      readfile($file);
      exit;
  } else {
    throw new Exception('File is invalid, or not accessible');
  }
} catch (Exception $ex) {
  // render error
  outputError($ex->getMessage());
}
