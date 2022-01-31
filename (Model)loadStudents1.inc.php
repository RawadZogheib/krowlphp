<?php 

	//getting the students's first name, nbr of seats and table type available for this user
	$current=$currentPage;
	$stable=20;
	
	$start=$stable*($current-1);
	$end=$stable*$current;

	$sql= "SELECT a.`account_Id`,a.`first_name`,a.`last_name`,a.`photo`,u.`uni_name` FROM `account`a JOIN `universities`u on a.`university_ids`=u.`uni_id` ORDER BY a.first_name ASC LIMIT ".$start.",".$end."";

	$xx = mysqli_query($con,$sql);
	

?>