<?php 

	$limit=array();
	require 'Functions.php';
	$limit=loadLimit($count,$currentPage);

	$sql= "SELECT a.`account_Id`,a.`first_name`,a.`last_name`,a.`photo`,a.`bio`,u.`uni_name` FROM `account`a JOIN `universities`u 
	on a.`university_ids`=u.`uni_id` WHERE a.`account_Id`!='".$account_Id."' ORDER BY a.first_name ASC LIMIT ".$limit[0].",".$limit[1]."";

	$xx = mysqli_query($con,$sql);
	

?>