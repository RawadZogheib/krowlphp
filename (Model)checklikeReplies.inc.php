<?php  

	//check if this user already like or unlike on a specific comment  

	$sql="SELECT count(*)as nbr,`reply_likes_val` FROM `reply_likes` WHERE `account_Id` = '".$account_Id."' AND `reply_id` = '".$reply_id."'";
	
	$xx1 = mysqli_query($con,$sql);
	$res2= mysqli_fetch_assoc($xx1);
        


?>