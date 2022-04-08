<?php

	//Getting account info

    $sql= "SELECT * FROM `account` WHERE `account_Id`='".$account_Id."'";

	$xx = mysqli_query($con,$sql);
	

    ?>