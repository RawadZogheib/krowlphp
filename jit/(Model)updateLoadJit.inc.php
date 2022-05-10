<?php 
	//updating occupant_video of an existing row
	  
	
	$sql="UPDATE `occupants` SET `load_jit`= '1' WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`=".$account.")";

	$xx3 = mysqli_query($con,$sql);
	 
?>

