<?php 

	//getting the table's name, nbr of seats and table type available for this user
	$current=$currentPage;
	$stable=12;
	
	$start=$stable*($current-1);
	$end=$stable*$current;

	$sql= "SELECT * FROM `tables`t JOIN `participant`p ON t.`table_id`=p.`table_id` WHERE t.`table_uni`='".$user_uni."' AND t.`isPrivate`='".$isPrivate."' AND p.`account_Id`= '".$account_Id."' ORDER BY created_at DESC LIMIT ".$start.",".$end."";

	$xx = mysqli_query($con,$sql);
	

?>