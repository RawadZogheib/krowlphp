<?php

$sql="SELECT *,count(*)as nbr FROM `friendships` WHERE `id1` = '".$id1."' AND `id2` = '".$id2."' OR `id1` = '".$id2."' AND `id2` = '".$id1."'";

$xx = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($xx); 


?>