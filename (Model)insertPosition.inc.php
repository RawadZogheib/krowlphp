<?php 
$sql="INSERT INTO `occupants`(`occupant_id`, `table_id`, `user_id`, `inviter_id`, `position`)
 VALUES (NULL,'".$table_id."','".$user_id."',0,'".$position."')";
 $xx = mysqli_query($con,$sql);
?>