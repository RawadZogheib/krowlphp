<?php
	$sql1 ="UPDATE `user` SET `password`='".$newHash."' WHERE `email` = '".$email."'";	
	$yy = mysqli_query($con,$sql1);
?>