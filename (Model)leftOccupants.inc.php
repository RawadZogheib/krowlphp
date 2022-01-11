<?php //Delete the occupant that left the meeting
   $con=con("krowl");
   $sql="DELETE FROM `occupants` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`='".$nameLeft."')";
    $yy=mysqli_query($con,$sql);
  

   
?>