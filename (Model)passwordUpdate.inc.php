<?php

	$sql1 ="UPDATE `account` SET `password`='".$newHash."' WHERE `email` = '".$email."'";	
	
	$yy = mysqli_query($con,$sql1);
?>