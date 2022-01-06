<?php 
require '(Model)config.inc.php';
$con=con();
$sql="DELETE FROM `occupants` WHERE `user_id`=(SELECT `user_id` FROM `user` WHERE `username`='".$nameLeft."')";
$yy=mysqli_query($con,$sql);


?>