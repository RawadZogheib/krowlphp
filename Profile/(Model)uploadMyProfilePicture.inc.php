<?php

    //Insert profile path
    $path ="https://krowl.dataflow.com.lb:8070/krowlphpTest/$target_dir/$filename";
    $sql1="UPDATE `account`
    SET `photo` = '$path' WHERE `account_Id` ='".$account_Id."'";

    $yy1=mysqli_query($con,$sql1);

    // if(mysqli_affected_rows($con)>0){
    
    // }

    // if(mysqli_affected_rows($con)>0){
    //     $notif_nbr= "LAST_INSERT_ID(notif_nbr) + 1";
    //     require '(Model)updateNotifNbr.inc.php';
    // }
?>