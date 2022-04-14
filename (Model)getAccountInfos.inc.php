<?php

	//Getting account info

    $sql= "SELECT a.`first_name`,a.`last_name`,a.`email`,a.`username`,a.`bio`,a.`date_of_birth`,a.`photo`,u.`uni_name`,d.`degree_name` AS major,de.`degree_name` AS minor 
	FROM `account`a JOIN `universities`u on a.`university_ids`=u.`uni_id` 
	JOIN `degrees`d on a.`major_degree_ids`=d.`degree_id` 
	JOIN `degrees`de on a.`minor_degree_ids`=de.`degree_id` WHERE a.`account_Id`='".$account_Id."'";

	$xx6 = mysqli_query($con,$sql);
	

    ?>