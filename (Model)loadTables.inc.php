<?php 

	//getting the table's name, nbr of seats and table type available for this user

	$sql= "SELECT `table_id`,`table_name`,`seats`,`table_type` FROM `tables` WHERE `table_uni`='".$user_uni."'";

	$xx = mysqli_query($con,$sql);
	

?>