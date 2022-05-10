<?php 
if(!empty($_GET['table']) && !empty($_GET['account'])){

			$room = '"vpaas-magic-cookie-5bea10f9861f4c588b1c164f2f3113de/'.htmlspecialchars($_GET['table']).'"';
      $account = '"'.htmlspecialchars($_GET['account']).'"';
      
      require "(Model)checkUserOccupant.inc.php";
        if($res1["nbr"] == 1){

          $occupant_video=$res1["occupant_video"];

          if($occupant_video <= 5){

            $load_jit=1;
            require '(Model)updateLoadJit.inc.php';
            
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