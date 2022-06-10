<?php 
     // if someone cancel the request friendship  
     $sql1="DELETE FROM `notifications` WHERE (`notif_sender`='".$sender."' AND json_extract(`notif_params`, '$.receiver') = '".$receiver_id."') OR (`notif_sender`='".$receiver_id."' AND json_extract(`notif_params`, '$.receiver') = '".$sender."') AND (`notif_type`='".$type."' OR `notif_type`='42')";

     $yy1 = mysqli_query($con,$sql1);
 

    // if(mysqli_affected_rows($con)>0){
    //     if( $sender_request == $receiver_id ){
    //         $notif_nbr= "IF(`notif_nbr`>0,LAST_INSERT_ID(notif_nbr) - 1,0)";
    //         require '(Model)updateNotifNbr.inc.php';
    //     }

    // }

?>
