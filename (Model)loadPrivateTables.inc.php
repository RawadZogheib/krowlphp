<?php 

	//getting the table's name, nbr of seats and table type available for this user
	$limit=array();
	require 'Functions.php';
	$limit=loadLimit($count,$currentPage);

	$sql= "SELECT * FROM `tables`t JOIN `participant`p ON t.`table_id`=p.`table_id` WHERE t.`table_uni`='".$user_uni."' AND t.`isPrivate`='".$isPrivate."' AND p.`account_Id`= '".$account_Id."' ORDER BY created_at DESC LIMIT ".$limit[0].",".$limit[1]."";

	$xx = mysqli_query($con,$sql);
	

?>