<?php 

	//getting the table's name, nbr of seats and table type available for this user
	$current=$currentPage;
	$stable=12;
	
	$start=$stable*($current-1);
	$end=$stable*$current;

	$sql= "SELECT `table_id`,`table_name`,`seats`,`isPrivate`,`isSilent` FROM `tables` WHERE `table_uni`='".$user_uni."' ORDER BY created_at DESC LIMIT ".$start.",".$end."";

	$xx = mysqli_query($con,$sql);
	

?>