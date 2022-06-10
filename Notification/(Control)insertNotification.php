<?php
$paramsArr = array();


switch ($notif_type) {

  case 31: // Forum, Creating a Reply
    $paramsArr = array("receiver"=>"$receiver_id", "post"=>array($post_id,
    $res["post_question"],
    $res["post_tag"],
    $res["username"],
    $res["post_likes"],
    $res["post_context"],
    $res["post_date"]
  ),
   "reply" => "$reply_id" );
    $fileRequired = '(Model)insertNotification.inc.php';
    break;

  case 32: // Forum, Like/Unlike a Post
    $paramsArr = array("receiver"=>"$receiver_id", "post"=>array($post_id,
    $res1["post_question"],
    $res1["post_tag"],
    $res1["username"],
    $res1["post_likes"],
    $res1["post_context"],
    $res1["post_date"]
    ), "like" => "$like");

    $fileRequired = '(Model)insertNotification.inc.php';
    break;
  
  case 33: // Forum, Like/Unlike a Reply
    $paramsArr = array("receiver"=>"$receiver_id",  "post"=>array($post_id,
    $res1["post_question"],
    $res1["post_tag"],
    $res1["username"],
    $res1["post_likes"],
    $res1["post_context"],
    $res1["post_date"]
    ), "reply" => "$reply_id", "like" => "$like");
    echo $paramsArr;
    $fileRequired = '(Model)insertNotification.inc.php';
    break;
  
  case 41: // Students & Student Profile, Request a Friendship

    $paramsArr = array("receiver"=>"$receiver_id","info"=>($infos),"request"=>"1");
    $fileRequired = '(Model)insertNotification.inc.php';
    break;

  case 42: // Students & Student Profile, Confirm Friendship Request 
    $type=41;
    $paramsArr = array("receiver"=>"$receiver_id","info"=>($infos), "request"=>"2");
    $fileRequired= '(Model)updateNotification.inc.php';
    break;
  
  case 43: // Students & Student Profile, Cancel Friendship/ Request Unfriend a user/ Stop Request Friendship
    $type=41;
    $fileRequired= '(Model)deleteNotification.inc.php';
    break;
  
}

$params = json_encode($paramsArr);

require $fileRequired;


?>