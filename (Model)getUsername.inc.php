<?php
		$sql="SELECT `username` as username FROM `account` WHERE `account_Id` ='".$account_Id."'";
		$xx = mysqli_query($con,$sql);
	 
?>