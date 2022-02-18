<?php 
//getting the friends ids of the account (recent==0 || recent==1) to delete recent field later

	$sql="SELECT  a.`account_Id`as account_Id,a.`username`as nameFriend, f.`friendship_id` as friend_id FROM `friendships`f join `account`a on f.id2=a.account_Id  WHERE `id1` ='".$student_id."' AND `request`=2 
	UNION SELECT  a.`account_Id`as account_Id,a.`username`as nameFriend,f.`friendship_id` as friend_id FROM `friendships`f join `account`a on f.id1=a.account_Id 
	WHERE `id2` = '".$student_id."' AND `request`=2" ;

	$xx5 = mysqli_query($con,$sql);
		
?>