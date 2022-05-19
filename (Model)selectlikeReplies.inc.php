<?php 
	//selecting likes of the post after inserting reply_like_val in reply_likes
	  
	$sql="SELECT `reply_likes`,`account_Id` FROM `replies` WHERE `reply_id` = '".$reply_id."'";

	$yy = mysqli_query($con,$sql);
	 
?>

