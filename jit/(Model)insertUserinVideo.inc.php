<?php 
	//updating like of an existing row
	  
	$sql="UPDATE `occupants` SET `occupant_video`='1' WHERE `occupant_id`='".$res1["occupant_id"]."'";

	$xx3 = mysqli_query($con,$sql);
	 
?>

