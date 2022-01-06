<?php 
//Webhook from jaas

$json = file_get_contents('php://input');
$data = json_decode($json);
if(!empty($data->data->name)){ //getting the name of the participant who left
  $nameLeft = htmlspecialchars($data->data->name);
}
else{
    //$nameLeft="failed";
}
require '(Model)leftOccupants.inc.php'; //delete the particpant from occupants so the position will be free again

?>