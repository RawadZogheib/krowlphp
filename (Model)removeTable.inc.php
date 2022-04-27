<?php 
	
	  
	$sql="DELETE FROM `tables` WHERE `table_id` = '".$table_id."' AND `admin_id` = '".$account_Id."'";

	$yy = mysqli_query($con,$sql);
	 
?>
