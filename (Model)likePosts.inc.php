<?php 
	//adding like into the post 
	  
	$sql="INSERT INTO `post_likes`(`post_likes_id`, `account_Id`, `post_id`) VALUES (NULL,'".$account_Id."','".$post_id."')";

	$xx = mysqli_query($con,$sql);
	 
?>




