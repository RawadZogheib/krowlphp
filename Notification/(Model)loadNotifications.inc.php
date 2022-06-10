<?php

	$limit=array();
	require '../Functions.php';
	$limit=loadLimit($count,$currentPage);

    //Notification where the user is the receiver and that the user has not read
    $sql = "SELECT * FROM `notifications`n JOIN `account`a on n.notif_sender=a.account_Id 
    WHERE json_extract(`notif_params`, '$.receiver') = '".$account_Id."' AND ($notif_status) ORDER BY created_at DESC LIMIT ".$limit[0].",".$limit[1]."";

    $k1 = mysqli_query($con,$sql);
   
//SELECT JSON_EXTRACT(notif_params,'$.r') FROM `notifications`
//SELECT *,JSON_ARRAY(`notif_params`) FROM `notifications` WHERE json_extract(`notif_params`, '$.r') = '68';
?>
