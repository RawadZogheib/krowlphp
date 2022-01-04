<?php 
$sql="INSERT INTO `tables`(`table_id`, `admin_id`, `table_name`,`table_uni`, `seats`, `table_type`)
VALUES (NULL,'".$user_id."','".$table_name."','".$table_uni."','".$seats."',2)";
$yy=mysqli_query($con,$sql);
?>