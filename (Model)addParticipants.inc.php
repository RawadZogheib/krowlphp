<?php 

	//$sql= "INSERT INTO `participant`(`particpant_id`, `table_id`, `account_Id`) VALUES (NULL,'".$table_id."','".$friend_id."')";
	$sql="INSERT INTO participant (table_id, account_Id)
	SELECT * FROM (SELECT '".$table_id."', '".$friend_id."') AS tmp
	WHERE NOT EXISTS (
		SELECT table_id,account_Id FROM participant WHERE table_id =  '".$table_id."' AND account_Id='".$friend_id."') LIMIT 1";
	$zz = mysqli_query($con,$sql);
	


?>