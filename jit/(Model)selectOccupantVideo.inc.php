<?php 

    //occupant_video = 0 .. 5 should be return one and only row because the user can join only one table at the same time and if there's any update it will be made on this row only
    require 'Global/globalVariables.php';
    require '../(Model)config.inc.php';
    $con=con($server);

    $sql="SELECT count(*)as nbr,`occupant_id`,`occupant_video`,`account_Id` FROM `occupants` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`='".$account."')";

    $zz1=mysqli_query($con,$sql);
    $res12= mysqli_fetch_assoc($zz1);


?>

