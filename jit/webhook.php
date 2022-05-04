<?php 
require '../(Model)config.inc.php';
$con=con("krowl");
$sql="INSERT INTO `jit`(`jit_id`, `jit_name`) VALUES(NULL,'".$account."')";
 $yy=mysqli_query($con,$sql);
?>