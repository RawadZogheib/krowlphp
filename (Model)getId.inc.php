<?php
		$sql="SELECT `account_Id` as account_Id FROM `account` WHERE `email` = '".$email."'";
		$xx = mysqli_query($con,$sql);
		$res = mysqli_fetch_assoc($xx);
?>