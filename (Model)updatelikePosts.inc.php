<?php 
	//updating like of an existing row
	  
	$sql="UPDATE `post_likes` SET `post_likes_val`='".$like_val."' WHERE `account_Id`='".$account_Id."' AND `post_id` = '".$post_id."'";

	$xx = mysqli_query($con,$sql);
	 
?>

