<?php 
	
	  
	$sql="DELETE FROM `participant`p JOIN `tables`t on p.`table_id`=t.`table_id` WHERE
     p.`table_id` = '".$table_id."' AND p.`account_Id` = '".$account_Id."' AND t.`admin_id`='".$admin_id."'";

	$yy = mysqli_query($con,$sql);
	 
?>