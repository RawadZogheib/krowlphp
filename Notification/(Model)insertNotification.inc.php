<?php


    //Insert Notification

    $sql1="INSERT INTO `notifications`(`notif_id`, `notif_sender`, `notif_params`, `notif_type`)
          VALUES (NULL,$sender,'$params',$notif_type)";

    $yy1=mysqli_query($con,$sql1);

    // if(mysqli_affected_rows($con)>0){
    
    // }

    // if(mysqli_affected_rows($con)>0){
    //     $notif_nbr= "LAST_INSERT_ID(notif_nbr) + 1";
    //     require '(Model)updateNotifNbr.inc.php';
    // }
?>