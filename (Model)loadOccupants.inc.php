<?php //getting the table's name, nbr of seats and table type available for this account

	// $sql = "SELECT o.`account_Id`,t.`table_name`,t.`seats`,t.`table_type` FROM `occupants`o JOIN `tables`t ON o.`table_id`=t.`table_id` WHERE o.`table_id` =
	// (SELECT `table_id` FROM `occupants` WHERE `account_Id`='".$account_Id."')'";


	$sql= "SELECT o.`account_Id`,o.`position`,a.`username`,a.`photo` FROM `occupants`o JOIN `account`a ON o.`account_Id`=a.`account_Id` WHERE o.`table_id` =
	(SELECT `table_id` FROM `tables` WHERE `table_name`='".$table_name."')ORDER BY o.`position`";

	$xx = mysqli_query($con,$sql);
	

?>