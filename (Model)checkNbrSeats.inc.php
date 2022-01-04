<?php  //check the number of participants that the table can support 
		$sql="SELECT `seats`,`table_id` FROM `tables` WHERE `table_name` = '".$table_name."'";
		$xx = mysqli_query($con,$sql);
		$res= mysqli_fetch_assoc($xx);
        
?>