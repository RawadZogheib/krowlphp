<?php 
	//Getting all the replies of a post
	  
	$sql="SELECT r.`reply_id`,p.`post_question`,r.`post_id`,r.`reply_data`, r.`reply_likes`, r.`reply_date` 
	FROM `replies`r LEFT JOIN `posts`p on r.`post_id`=p.`post_id` WHERE r.account_Id='".$account_Id."'";

	$xx3 = mysqli_query($con,$sql);
	 
?>
