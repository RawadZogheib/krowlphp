<?php 

    //occupant_video = 0 .. 5 should be return one and only row because the user can join only one table at the same time and if there's any update it will be made on this row only
    require '../(Model)config.inc.php';
    $con=con("krowl");

    $sql="SELECT count(*)as nbr,o.`occupant_id`,o.`occupant_video`,t.`isSilent` FROM `occupants`o JOIN `tables`t on o.`table_id`=t.`table_id` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`=".$account.") AND `table_name`='".$_GET['table']."'";

    $zz=mysqli_query($con,$sql);
    $res1= mysqli_fetch_assoc($zz);


?>

