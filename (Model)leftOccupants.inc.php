<?php //Delete the occupant that left the meeting
   require '(Model)config.inc.php';
   $con=con($server);
    $sql="INSERT INTO `leftoccupants`(`id_leftoccupant`, `name`) VALUES (NULL,'TOTOOO')";
    $yy=mysqli_query($con,$sql);
    // $sql="DELETE FROM `occupants` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`='".$nameLeft."')";
    // $yy=mysqli_query($con,$sql);

   
?>