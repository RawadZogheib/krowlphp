<?php 

	
	$current=$currentPage;
	$stable=20;
	
	$start=$stable*($current-1);
	$end=$stable*$current;

	$sql= "SELECT a.`account_Id`,a.`first_name`,a.`last_name`,a.`photo`,a.`bio`,u.`uni_name` FROM `account`a JOIN `universities`u 
	on a.`university_ids`=u.`uni_id` WHERE a.`account_Id`!='".$account_Id."' ORDER BY a.first_name ASC LIMIT ".$start.",".$end."";

	$xx = mysqli_query($con,$sql);
	

?>