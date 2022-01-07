<?php

	//Getting vcode of an account 

	$sql="SELECT `vcode` as vCode FROM `account` WHERE `email` = '".$email."'";
	
	$xx = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($xx);
?>