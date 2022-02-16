<?php

	$sql = "UPDATE `account` SET `token_chat`= '".$userTokenChat."' WHERE `email`='".$email."'";

	$xx1 = mysqli_query($con,$sql);
	
?>