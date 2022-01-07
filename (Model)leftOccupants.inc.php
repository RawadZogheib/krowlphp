<?php 
require '(Model)config.inc.php';
$con=con();
$sql="DELETE FROM `occupants` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`='".$nameLeft."')";
$yy=mysqli_query($con,$sql);


?>