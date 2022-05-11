<?php 
	//updating occupant_video of an existing row
	  
	
	$sql="INSERT INTO `occupants`(`occupant_id`, `table_id`, `account_Id`, `inviter_id`, `position`, `occupant_video`)
    VALUES (NULL,'".$table."','".$res12["account_Id"]."','0','".$position."','1')";

	$xx4 = mysqli_query($con,$sql);

?>

