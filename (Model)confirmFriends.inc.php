<?php

    $sql="UPDATE `friendships` SET `request`=2 WHERE `id1` = '".$id1."' AND `id2` = '".$id2."' OR `id1` = '".$id2."' AND `id2` = '".$id1."'";
    $yy=mysqli_query($con,$sql);        

 
?>