<?php

	//Getting last id fo an account

	$sql="SELECT MAX(account_Id)as lastId FROM account";

	$xx = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($xx);

?>