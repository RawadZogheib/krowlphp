<?php 

	//getting the friends ids of the account that he has been talk to recently(recent==1)

	$sql="SELECT a.`account_Id`as account_Id, a.`username` as nameFriend, f.`friendship_id` as friend_id FROM `friendships`f join `account`a on f.id2=a.account_Id  WHERE `id1` ='".$account_Id."' 
	AND `recent`='1' UNION SELECT a.`account_Id`as account_Id,a.`username` as nameFriend,f.`friendship_id` as friend_id FROM `friendships`f join `account`a on f.id1=a.account_Id 
	WHERE `id2` = '".$account_Id."' AND `recent`='1'";

	$xx = mysqli_query($con,$sql);	
		
?>