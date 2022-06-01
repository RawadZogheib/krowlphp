<?php 

	//getting the table's name, nbr of seats and table type available for this user
	$limit=array();
	require 'Functions.php';
	$limit=loadLimit($count,$currentPage);

	$sql= "SELECT * FROM `tables` WHERE `table_uni`='".$user_uni."' AND `isPrivate`='".$isPrivate."' ORDER BY created_at DESC LIMIT ".$limit[0].",".$limit[1]."";

	$xx = mysqli_query($con,$sql);
	

?>