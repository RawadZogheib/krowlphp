<?php 
if(!empty($_GET['table']) && !empty($_GET['account'])){  

  $getaccount=htmlspecialchars($_GET['account']);

  $tableaccount = explode("/", $getaccount);
  require '../Global/globalVariables.php';

			$room = "\"".$jaasAppID.htmlspecialchars($_GET['table'])."\"";
      $account = '"'.$tableaccount[0].'"';
      
      require "(Model)checkUserOccupant.inc.php";
        if($res1["nbr"] == 1){

          $occupant_video=$res1["occupant_video"];

          if($occupant_video <= 5){
            
            $type=$res1["isSilent"];
            require 'jit.php';  

          }else{
              echo 'You exceed the number of attendence';
              }
        }else{
              echo 'Error';
            }
}else{
              echo 'Field cannot be empty.';
        } 
?>