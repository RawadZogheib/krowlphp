<?php 


	$sql= "SELECT a.`account_Id`, a.`username`,a.`photo` FROM `participant`p JOIN `account`a ON p.`account_Id`=a.`account_Id` WHERE p.`table_id` ='".$table_id."'
	ORDER BY CASE WHEN a.`account_Id`='".$admin_id."' THEN 1 ELSE 2 END";

	$yy1 = mysqli_query($con,$sql);
	

?>