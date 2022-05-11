<?php 
	//updating occupant_video of an existing row
	  
	
	$sql="UPDATE `occupants` SET `occupant_video`= '".$occupant_video."' WHERE `occupant_id`='".$occupant_id."'";

	$xx3 = mysqli_query($con,$sql);
    // INSERT INTO `occupants`(`occupant_id`, `table_id`, `account_Id`, `inviter_id`, `position`, `occupant_video`, `joined_at`)
    //  VALUES (NULL,'[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
?>

