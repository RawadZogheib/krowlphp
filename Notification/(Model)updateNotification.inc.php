<?php 

$sql="UPDATE `notifications`
SET `notif_params` = '$params',`notif_sender`='".$sender."',`notif_type`='".$notif_type."'
WHERE `notif_sender`='".$receiver_id."' AND json_extract(`notif_params`, '$.receiver') = '".$sender."'AND json_extract(`notif_params`, '$.request') = '1' AND `notif_type`='".$type."'";

$yy=mysqli_query($con,$sql);

if(mysqli_affected_rows($con)>0){
    $notif_nbr= "LAST_INSERT_ID(notif_nbr) + 1";
    require '(Model)updateNotifNbr.inc.php';
    // $notif_nbr= "LAST_INSERT_ID(notif_nbr) - 1";
    // $receiver_id=$sender;
    // require '(Model)updateNotifNbr.inc.php';
}

?>