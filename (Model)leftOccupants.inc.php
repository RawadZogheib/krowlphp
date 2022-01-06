<?php 
require '(Model)config.inc.php';
$con=con();
// $sql="DELETE FROM `occupants` WHERE `user_id`=(SELECT `user_id` FROM `user` WHERE `username`='".$nameLeft."')";
// $yy=mysqli_query($con,$sql);

$sql="INSERT INTO `leftoccupants`(`id_leftoccupant`, `name`) VALUES (NULL,'".$nameLeft."')";
$yy=mysqli_query($con,$sql);

?>