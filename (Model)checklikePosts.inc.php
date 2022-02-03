<?php  

	//check if this user already like or unlike on a specific post  

	$sql="SELECT count(*)as nbr,`post_likes_val` FROM `post_likes` WHERE `account_Id` = '".$account_Id."' AND `post_id` = '".$post_id."'";
	
	$xx1 = mysqli_query($con,$sql);
	$res2= mysqli_fetch_assoc($xx1);
        


?>