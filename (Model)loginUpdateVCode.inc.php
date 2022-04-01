<?php 
	$sqlqq="UPDATE `account` SET `vcode` = '".$vCode."' WHERE `account_Id` = '".$account_Id."'";
									
	$qq=mysqli_query($con,$sqlqq);
?>
 