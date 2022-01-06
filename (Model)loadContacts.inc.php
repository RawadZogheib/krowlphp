<?php //getting the friends ids of the user that he has been talk to recently(recent==1)

		$sql="SELECT u.`user_id`as user_id,u.`username` as nameFriend, f.`friendship_id` as friend_id FROM `friendships`f join `user`u on f.id2=u.user_id  WHERE `id1` ='".$user_id."' 
		AND `recent`='1' UNION SELECT u.`user_id`as user_id,u.`username` as nameFriend,f.`friendship_id` as friend_id FROM `friendships`f join `user`u on f.id1=u.user_id WHERE `id2` = '".$user_id."' AND `recent`='1'";
		$xx = mysqli_query($con,$sql);
		
		
?>