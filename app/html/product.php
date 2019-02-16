<?php
// set utc time
date_default_timezone_set('UTC');

// Include the SDK using the Composer autoloader
require('../vendor/autoload.php');

// include output module
require('modules/output.php');
require('modules/reviews.php');

// start a session
session_start();

// output variables
$output = array();
$template = '';

// try/catch
try {
  // review submitted?
  if ($_SERVER['REQUEST_METHOD'] === 'POST' and $_POST['reviewSubmit'] === 'Submit') {
    saveReview($_POST['reviewEmail'], $_POST['reviewName'], $_POST['reviewTitle'], $_POST['reviewStory']);
  }

  // get reviews
  $output['listReviews'] = listReviews();

  // set post url
  $output['postUrl'] = $_SERVER['REQUEST_URI'];

  // include header logic
  require('_header.php');

	// get template and replace placeholders
	$template .= file_get_contents('includes/product.html');

  // include footer logic
  require('_footer.php');

  // render content
	outputContent($template, $output);
} catch (Exception $ex) {
  // render error
  outputError($ex->getMessage());
}
