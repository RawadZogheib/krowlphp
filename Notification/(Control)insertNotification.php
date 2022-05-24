<?php
$paramsArr = array();


switch ($notif_type) {

  case 31: // Forum, Creating a Reply
    $paramsArr = array("receiver"=>"$receiver_id", "post"=>"$post_id", "reply" => "$reply_id");
    $fileRequired = '(Model)insertNotification.inc.php';
    break;

  case 32: // Forum, Like/Unlike a Post
    $paramsArr = array("receiver"=>"$receiver_id", "post"=>"$post_id", "like" => "$like");
    $fileRequired = '(Model)insertNotification.inc.php';
    break;
  
  case 33: // Forum, Like/Unlike a Reply
    $paramsArr = array("receiver"=>"$receiver_id", "post"=>"$post_id", "reply" => "$reply_id", "like" => "$like");
    $fileRequired = '(Model)insertNotification.inc.php';
    break;
  
  case 41: // Students & Student Profile, Request a Friendship
    $paramsArr = array("receiver"=>"$receiver_id", "request"=>"1");
    $fileRequired = '(Model)insertNotification.inc.php';
    break;
  
  case 42: // Students & Student Profile, Cancel Friendship/ Request Unfriend a user/ Stop Request Friendship
    $type=41;
    $fileRequired= '(Model)deleteNotification.inc.php';
    break;

  case 43: // Students & Student Profile, Confirm Friendship Request 
    $type=41;
    $paramsArr = array("receiver"=>"$receiver_id", "request"=>"2");
    $fileRequired= '(Model)updateNotification.inc.php';
    break;
  
}

$params = json_encode($paramsArr);

require $fileRequired;

?>