<?php

	$sql1 ="SELECT `password` as hashedPassword FROM `account` WHERE `email` = '".$email."'";	

	$xx = mysqli_query($con,$sql1);
    $res = mysqli_fetch_assoc($xx);
	
?>