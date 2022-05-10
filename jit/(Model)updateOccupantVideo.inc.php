<?php 
	//updating occupant_video of an existing row
	  
	
	$sql="UPDATE `occupants` SET `occupant_video`= '".$occupant_video."',`load_jit`= 0 WHERE `occupant_id`='".$occupant_id."'";

	$xx3 = mysqli_query($con,$sql);
	 
?>

