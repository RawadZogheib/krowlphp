<?php  

	$sql="SELECT count(*)as nbr FROM `occupants` WHERE `table_id` = '$table_id' AND `occupant_video`!= 0 ";
	
	$xx = mysqli_query($con,$sql);
	$res1= mysqli_fetch_assoc($xx);
        


?>