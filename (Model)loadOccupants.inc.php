<?php //getting the table's name, nbr of seats and table type available for this user

	// $sql = "SELECT o.`user_id`,t.`table_name`,t.`seats`,t.`table_type` FROM `occupants`o JOIN `tables`t ON o.`table_id`=t.`table_id` WHERE o.`table_id` =
	// (SELECT `table_id` FROM `occupants` WHERE `user_id`='".$user_id."')'";


	$sql= "SELECT o.`user_id`,o.`position`,u.`username`,u.`photo` FROM `occupants`o JOIN `user`u ON o.`user_id`=u.`user_id` WHERE o.`table_id` =
	(SELECT `table_id` FROM `tables` WHERE `table_name`='".$table_name."')ORDER BY o.`position`";

	$xx = mysqli_query($con,$sql);
	

?>