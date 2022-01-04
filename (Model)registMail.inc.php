<?php
		$sql="SELECT count(*)as nbr FROM `user` WHERE `email` = '".$email."'";
		$xx = mysqli_query($con,$sql);
		$res = mysqli_fetch_assoc($xx);
?>