<?php  

	//count the number of places that are taken, which is the number of occupants 

	$sql="SELECT count(*)as nbr FROM `occupants` WHERE `table_id` = '".$table_id."'";
	
	$xx = mysqli_query($con,$sql);
	$res1= mysqli_fetch_assoc($xx);
        


?>