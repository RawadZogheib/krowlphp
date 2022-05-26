<?php 
  
    $receiver_id = $account_Id;

    $notif_nbr= 0;
    require '(Model)updateNotifNbr.inc.php';
    if(mysqli_affected_rows($con)>0){

        $json_array[0] = 'success';

    }else if(mysqli_affected_rows($con) == -1){
        $json_array[0] = 'error4';
    }

?>