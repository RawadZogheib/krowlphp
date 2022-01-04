<?php
		$sql="SELECT `username` as username FROM `user` WHERE `user_id` = '".$user_id."'";
		$xx = mysqli_query($con,$sql);
		$res = mysqli_fetch_assoc($xx); 
?>