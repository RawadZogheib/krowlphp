<?php 	//Check if the the position in the table is taken 
		$sql="SELECT count(*)as nbr FROM `occupants`o WHERE `table_id` = '".$table_id."' AND `position` = '".$position."'";
		$xx = mysqli_query($con,$sql);
		$res = mysqli_fetch_assoc($xx);
		
	
	
?>