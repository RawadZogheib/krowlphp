<?php
$paramsArr = array();
$fileRequired = '(Model)insertNotification.inc.php';

switch ($notif_type) {

  case 31: // Forum, Creating a Reply
    $paramsArr = array("receiver"=>"$receiver_id", "post"=>"$post_id", "reply" => "$reply_id");
    break;

  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}

$params = json_encode($paramsArr);

require $fileRequired;

?>