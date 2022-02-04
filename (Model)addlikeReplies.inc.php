<?php 
	//adding like into the comment 
	$sql="INSERT INTO `reply_likes`(`reply_likes_id`, `account_Id`, `reply_id`, `reply_likes_val`)  
    VALUES (NULL,'".$account_Id."','".$reply_id."','".$like_val."')";

	$xx = mysqli_query($con,$sql);
	 
?>









