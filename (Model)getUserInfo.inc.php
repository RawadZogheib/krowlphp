<?php
	$sql="SELECT * FROM `account` WHERE `email` = '".$email."'";
	
	$xx = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($xx);
?>