<?php 
	//if a user like/unlike a post and then like/unlike again then i will delete the row with the same value
	  
	$sql="DELETE FROM `post_likes` WHERE `post_likes_val`='".$like_val."' AND `account_Id`='".$account_Id."' AND `post_id` = '".$post_id."'";

	$xx = mysqli_query($con,$sql);
	 
?>
