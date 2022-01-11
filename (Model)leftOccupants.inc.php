<?php //Delete the occupant that left the meeting
   
	function con() {
		$con = mysqli_connect("127.0.0.1","root","gU4YTcNMe3AEPY7M","krowl")or die("Failed to connect... Try again in few seconds");
		return $con;
	}

   $con=con();
   $sql="DELETE FROM `occupants` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`='".$nameLeft."')";
    $yy=mysqli_query($con,$sql);
  

   
?>