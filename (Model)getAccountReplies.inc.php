<?php 
	//Getting all the replies of a post
	  
	$sql="SELECT r.`reply_id`,r.`reply_data`, r.`reply_likes`, r.`reply_date`,p.`post_question`,p.`post_tag`,p.`post_likes`,p.`post_context`,r.`post_id`,p.`post_date`
	FROM `replies`r LEFT JOIN `posts`p on r.`post_id`=p.`post_id` WHERE r.account_Id='".$account_Id."'ORDER BY r.`reply_date` DESC";

	$xx3 = mysqli_query($con,$sql);
	 
?>
