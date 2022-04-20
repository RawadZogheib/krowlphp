<?php 

    //Insert values into Replies
    require '../(Model)config.inc.php';
    $con=con("krowltest");
    $sql="SELECT count(*)as nbr,`occupant_id` FROM `occupants` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`=".$account.") AND `occupant_video`=0";

    $zz=mysqli_query($con,$sql);
    $res1= mysqli_fetch_assoc($zz);
    echo "AAAAAAAAA";
    echo $res1;

?>

