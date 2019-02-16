<?php

// list reviews
function listReviews($product_id = NULL) {
  $reviews = '';
  if (isset($_SESSION['reviews']) and is_array($_SESSION['reviews']) and count($_SESSION['reviews'])) {
    foreach ($_SESSION['reviews'] as $r) {
      $reviews .= '<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title">' . $r['title'] . '</h3></div><div class="panel-body">' . $r['story'] . '</div><div class="panel-footer"> by <b>' . $r['name'] . '</b> on ' . $r['date'] . '</div></div>';
    }
  }
  return $reviews;
}

// save reviews
function saveReview($email, $name, $title, $story) {
  if (!(isset($_SESSION['reviews']) and is_array($_SESSION['reviews']) and count($_SESSION['reviews']))) {
    $_SESSION['reviews'] = array();
  }
  array_unshift($_SESSION['reviews'], array('email' => $email, 'name' => $name, 'title' => $title, 'story' => $story, 'ts' => time(), 'date' => date('F jS, Y')));
  return true;
}
