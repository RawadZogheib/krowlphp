<?php 

    //Insert values into Replies
    require '../(Model)config.inc.php';
    $con=con("krowl");
    $sql="SELECT count(*)as nbr FROM `occupants` WHERE `account_Id`='". $account_Id."'";

    $zz=mysqli_query($con,$sql);
    $res1= mysqli_fetch_assoc($zz);

?>

