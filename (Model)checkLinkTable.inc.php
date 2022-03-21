<?php

$sql="SELECT count(*)as nbr FROM `tables` WHERE `table_id` = '".$array1[0]."' AND `table_pass` = '".$array1[1]."'";

$xx = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($xx); 


?>