<?php 

    //occupant_video = 0 -> he's sitting on a table but didn't join the jit meeting 
    require '../(Model)config.inc.php';
    $con=con("krowl");

    $sql="SELECT count(*)as nbr,`occupant_id`,`occupant_video` FROM `occupants` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`=".$account.")";

    $zz=mysqli_query($con,$sql);
    $res1= mysqli_fetch_assoc($zz);


?>

