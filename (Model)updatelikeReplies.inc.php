<?php 
	//updating like of an existing row
	  
	$sql="UPDATE `reply_likes` SET `post_likes_val`='".$like_val."' WHERE `account_Id`='".$account_Id."' AND `reply_id` = '".$reply_id."'";

	$xx = mysqli_query($con,$sql);
	 
?>

