<?php 
	//Getting all the replies of a post
	
	$limit=array();
	require 'Functions.php';
	$limit=loadLimit($count,$currentPage);


	$sql="SELECT r.`reply_id`,r.`reply_data`, r.`reply_likes`, r.`reply_date`,a.`username` FROM `replies`r
	join `account`a on r.`account_Id`=a.`account_Id` WHERE r.post_id='".$post_id."' ORDER BY r.`reply_date` DESC LIMIT ".$limit[0].",".$limit[1]."";

	$xx = mysqli_query($con,$sql);
	 
?>
