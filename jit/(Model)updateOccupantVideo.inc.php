<?php 
	//updating occupant_video of an existing row
	  
	
	$sql="UPDATE `occupants` SET `occupant_video`= '".$occupant_video."' AND `load_jit`= '".$load_jit."' WHERE `occupant_id`='".$occupant_id."'";

	$xx3 = mysqli_query($con,$sql);
	 
?>

