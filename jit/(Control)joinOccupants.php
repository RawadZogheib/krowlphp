<?php 

//WebHook 

$json = file_get_contents('php://input');
$data = json_decode($json);
if(!empty($data->data->name)){ //getting the name of the participant who left
  $nameJoined = htmlspecialchars($data->data->name);
  require '(Model)joinOccupants.inc.php'; //delete the particpant from occupants so the position will be free again
}
else{
    $nameJoined="failed";
}

?>