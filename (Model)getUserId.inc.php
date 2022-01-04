<?php
	$sql = "SELECT user_id as userid FROM `user` WHERE  `email` = '".$email."'";
	$xx = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($xx);

?>