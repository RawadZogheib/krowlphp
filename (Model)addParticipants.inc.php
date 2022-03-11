<?php 

	$sql= "INSERT INTO `participant`(`particpant_id`, `table_id`, `account_Id`) VALUES (NULL,'".$table_id."','".$friend_id."')";

	$zz = mysqli_query($con,$sql);
	

?>