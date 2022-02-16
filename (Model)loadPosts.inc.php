<?php 
	//Getting all the posts of account and account's friends that are in the same uni with him 
	  
	$sql="SELECT p.`post_id`, p.`post_question`,p.`post_context`, p.`post_likes`, p.`post_tag`, p.`post_date`, a.`username` FROM `posts`p 
	join `account`a on p.`account_Id`=a.`account_Id` WHERE a.university_ids='".$user_uni."' ORDER BY p.`post_date` DESC";

	$xx = mysqli_query($con,$sql);
	 
?>
