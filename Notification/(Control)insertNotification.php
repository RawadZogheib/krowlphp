<?php
$paramsArr = array();
$fileRequired = '(Model)insertNotification.inc.php';

switch ($notif_type) {

  case 31: // Forum, Creating a Reply
    $paramsArr = array("receiver"=>"$receiver_id", "post"=>"$post_id", "reply" => "$reply_id");
    break;

  case 32:
    $paramsArr = array("receiver"=>"$receiver_id", "post"=>"$post_id", "like" => "$like");
    break;

}

$params = json_encode($paramsArr);

require $fileRequired;

?>