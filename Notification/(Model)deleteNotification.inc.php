<?php 
     // if someone cancel the request friendship  
	$sql1="DELETE FROM `notifications` WHERE (`notif_sender`='".$sender."' AND json_extract(`notif_params`, '$.receiver') = '".$receiver_id."') OR (`notif_sender`='".$receiver_id."' AND json_extract(`notif_params`, '$.receiver') = '".$sender."') AND (`notif_type`='".$type."')";

	$yy1 = mysqli_query($con,$sql1);

    // if(mysqli_affected_rows($con)>0){
    //     if( $sender_request == $receiver_id ){
    //         $notif_nbr= "LAST_INSERT_ID(notif_nbr) - 1";
    //         require '(Model)updateNotifNbr.inc.php';
    //     }

    // }

    
?>
