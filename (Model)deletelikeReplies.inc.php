<?php 
	//if a user like/unlike a reply and then like/unlike again then i will delete the row with the same value
	  
	$sql="DELETE FROM `reply_likes` WHERE `reply_likes_val`='".$like_val."' AND `account_Id`='".$account_Id."' AND `reply_id` = '".$reply_id."'";

	$xx = mysqli_query($con,$sql);
	 
?>
