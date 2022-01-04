<?php
	$sql = "SELECT count(*)as nbr, `password` as hashedPassword,`user_id` as user_id FROM `user` WHERE  `email` = '".$email."'";
	$xx = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($xx);
	

//	(Model)passwordGet.inc.php
// 	<?php
// 	$sql1 ="SELECT `password` as hashedPassword FROM `user` WHERE `email` = '".$email."'";	
// 	$xx = mysqli_query($con,$sql1);
//     $res = mysqli_fetch_assoc($xx);
//
?>