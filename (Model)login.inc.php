<?php

	$sql = "SELECT count(*)as nbr, `password` as hashedPassword,`account_Id` as account_Id, `isRegistered` as isRegistered FROM `account` WHERE  `email` = '".$email."'";

	$xx = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($xx);
	

//	(Model)passwordGet.inc.php
// 	<?php
// 	$sql1 ="SELECT `password` as hashedPassword FROM `account` WHERE `email` = '".$email."'";	
// 	$xx = mysqli_query($con,$sql1);
//     $res = mysqli_fetch_assoc($xx);
//
?>