<?php
// set utc time
date_default_timezone_set('UTC');

// Include the SDK using the Composer autoloader
require('../vendor/autoload.php');

// include output module
require('modules/output.php');

// start a session
session_start();

// output variables
$output = array();
$template = '';

// try/catch
try {
  // set post url
  $output['postUrl'] = $_SERVER['REQUEST_URI'];
  $output['successMessage'] = '';

  // order submitted?
  if ($_SERVER['REQUEST_METHOD'] === 'POST' and $_POST['orderSubmit'] === 'Submit') {
    if (isset($_SERVER['HTTP_X_CSRF_TOKEN']) and $_SERVER['HTTP_X_CSRF_TOKEN'] == $_SESSION['csrf']) {
      $output['successMessage'] = '<div class="alert alert-ok" role="alert">Thank you for submitting the form, your order has been placed.</div>';
    } else {
      throw new Exception('Cannot complete the requested order');
    }
  } else {
    // CSRF token
    $token = sha1(uniqid('', true));
    $_SESSION['csrf'] = $token;
    $output['csrfToken'] = $token;
  }

  // include header logic
  require('_header.php');

	// get template and replace placeholders
	$template .= file_get_contents('includes/form.html');

  // include footer logic
  require('_footer.php');

  // render content
	outputContent($template, $output);
} catch (Exception $ex) {
  // render error
  outputError($ex->getMessage());
}
