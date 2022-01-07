<?php
		$sql="SELECT count(*)as nbr FROM `account` WHERE `username` = '".$username."'";
		$xx = mysqli_query($con,$sql);
		$res = mysqli_fetch_assoc($xx);
?>