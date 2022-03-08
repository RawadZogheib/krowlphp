<?php

	$sql="SELECT count(*)as nbr FROM `participant` WHERE `account_Id`= '".$account_Id."'";

	$xx = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($xx);

?>