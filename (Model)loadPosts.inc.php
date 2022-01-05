<?php //getting all the posts of user and user's friends that are in the same uni with him 
		$sql="SELECT p.`post_id`, p.`post_data`, p.`post_val`, p.`post_date`, u.`username` FROM `posts`p 
        join `user`u on p.`user_id`=u.`user_id` WHERE u.university_ids='".$user_uni."'";
		$xx = mysqli_query($con,$sql);
	 
?>
