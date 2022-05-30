<?php 
     // if someone cancel the request friendship  
	$sql1="DELETE FROM `notifications` WHERE (`notif_sender`='".$sender."' AND json_extract(`notif_params`, '$.receiver') = '".$receiver_id."') OR (`notif_sender`='".$receiver_id."' AND json_extract(`notif_params`, '$.receiver') = '".$sender."') AND (`notif_type`='".$type."')";

	$yy1 = mysqli_query($con,$sql1);



?>
