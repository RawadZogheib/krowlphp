<?php 

//WebHook 

$json = file_get_contents('php://input');
$data = json_decode($json);

if(!empty($data->data->name)){ //getting the name of the participant who joined
  $account = htmlspecialchars($data->data->name);
  $json_array[0]="error4";

  require "(Model)checkUserinVideo.inc.php";
  $occupant_video=$res1["occupant_video"];
  $occupant_id=$res1["occupant_id"];
  $occupant_video=$occupant_video+1;
  require "(Model)insertUserinVideo.inc.php";
  if($xx3){
    $json_array[0]="success";
  }
}
else{
    $account="failed";
}
require '(Model)joinOccupants.inc.php'; 
?>