<?php 

$sql2="UPDATE `account`
SET `notif_nbr` = $notif_nbr
WHERE `account_Id` ='".$receiver_id."'";

$yy2=mysqli_query($con,$sql2);


?>