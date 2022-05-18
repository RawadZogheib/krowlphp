<?php 

//WebHook 
     
$json = file_get_contents('php://input');
$data = json_decode($json);



if(!empty($data->data->name) || !empty($data->fqn)){//getting the name of the participant who joined
  $getaccount = htmlspecialchars($data->data->name);
  $fqn = htmlspecialchars($data->fqn);

  $tableaccount = explode("/", $getaccount);
  $account = $tableaccount[0];
  $position =$tableaccount[1];
  
  require 'Global/globalVariables.php';

  $gettable = explode("$jaasAppID", $fqn);
  $table =  $gettable[1];
  $json_array[0]="error4";


  require "(Model)selectOccupantVideo.inc.php";

  if($res12["nbr"] == 1){

    $occupant_video=$res12["occupant_video"];
    $occupant_id=$res12["occupant_id"];

    if($occupant_video >= 0){
      $occupant_video=$occupant_video + 1;
      require "(Model)updateOccupantVideo.inc.php";
      if($xx3){
        $json_array[0]="success";
      }
      
    }

  }else if($res12["nbr"] == 0){
      require '(Model)insertOccupantVideo.inc.php';
      if($xx4){
        $json_array[0]="success";
      }
    }
}else{
    $account="failed";
}
require 'webhook.php'; 
?>