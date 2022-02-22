<?php 
	//Getting all the replies of a post
	  
	$sql="SELECT r.`reply_id`,r.`post_id`,r.`reply_data`, r.`reply_likes`, r.`reply_date` FROM `replies`r
	 WHERE r.account_Id='".$account_Id."'";

	$xx3 = mysqli_query($con,$sql);
	 
?>
