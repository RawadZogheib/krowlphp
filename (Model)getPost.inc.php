<?php 
	//selecting likes of the post after inserting post_like_val in post_likes
	  
	$sql="SELECT p.`post_id`,p.`account_Id`,p.`post_question`,p.`post_context`, p.`post_likes`, p.`post_tag`, p.`post_date`, a.`username` FROM `posts`p join `account`a on p.`account_Id`=a.`account_Id` WHERE `post_id` = '".$post_id."'";

	$yy = mysqli_query($con,$sql);

?>

