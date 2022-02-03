<?php 
	//adding like into the post 
	  
	$sql="INSERT INTO `post_likes`(`post_likes_id`, `account_Id`, `post_id`, `post_likes_val`) VALUES (NULL,'".$account_Id."','".$post_id."','".$like_val."')";

	$xx = mysqli_query($con,$sql);
	 
?>




