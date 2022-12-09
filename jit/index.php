<?php 
if(!empty($_GET['table']) && !empty($_GET['account'])){  

  $getaccount=htmlspecialchars($_GET['account']);

  $tableaccount = explode("/", $getaccount);
  require '../Global/globalVariables.php';

			$room = "\"".$jaasAppID.htmlspecialchars($_GET['table'])."\"";
      $account = '"'.$tableaccount[0].'"';
      $type = htmlspecialchars($_GET['type']);
      
        //if($res1["nbr"] == 1){

         // $occupant_video=$res1["occupant_video"];

          // if($occupant_video <= 5){
            
          
            require 'jit.php';  

          // }else{
          //     echo 'You exceed the number of attendence';
          //     }
        // }else{
        //       echo 'Error';
        //     }
}else{
              echo 'Field cannot be empty.';
        } 
?>