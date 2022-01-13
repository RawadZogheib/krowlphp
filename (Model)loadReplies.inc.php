<?php 
	//Getting all the replies of a post
	  
	$sql="SELECT r.`reply_id`,r.`reply_data`, r.`reply_val`, r.`reply_date`,a.`username` FROM `replies`r
	join `account`a on r.`account_Id`=a.`account_Id` WHERE r.post_id='".$post_id."'";

	$xx = mysqli_query($con,$sql);
	 
?>
