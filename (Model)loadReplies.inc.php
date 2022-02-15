<?php 
	//Getting all the replies of a post
	
	$current=$currentPage;
	$stable=20;
	
	$start=$stable*($current-1);
	$end=$stable*$current;


	$sql="SELECT r.`reply_id`,r.`reply_data`, r.`reply_likes`, r.`reply_date`,a.`username` FROM `replies`r
	join `account`a on r.`account_Id`=a.`account_Id` WHERE r.post_id='".$post_id."' ORDER BY r.`reply_date` DESC LIMIT ".$start.",".$end."";

	$xx = mysqli_query($con,$sql);
	 
?>
