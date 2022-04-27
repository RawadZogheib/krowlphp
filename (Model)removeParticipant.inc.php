<?php 
	
	  
	$sql="DELETE FROM `participant`p JOIN `tables`t on p.`table_id`=t.`table_id` WHERE
     p.`table_id` = '".$table_id."' AND p.`account_Id` = '".$particpant_id."' AND t.`admin_id`='".$account_Id."'";

	$yy = mysqli_query($con,$sql);
	 
?>