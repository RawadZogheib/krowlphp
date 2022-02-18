<?php

	//Getting account info

    $sql= "SELECT a.`first_name`,a.`last_name`,a.`photo`,a.`bio`,u.`uni_name` FROM `account`a JOIN `universities`u 
	on a.`university_ids`=u.`uni_id` WHERE a.`account_Id`='".$account_Id."'";

	$xx6 = mysqli_query($con,$sql);
	

    ?>