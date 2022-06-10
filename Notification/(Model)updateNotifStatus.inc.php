<?php
// 0 -> user didn't open the ring bell
// 1 -> user opened the ring bell but didn't click on any the notification
// 2 -> user opened the ring bell & click on one the notification 
// 3 -> user dissmiss a notification so it will not be shown in the ring bell pop up but when pressing show more
// 4 -> the notiifcation dismissed that is appearing  in show more is being clicked by so instead of changing it to 2 it will be changed to 4 

$sql = " UPDATE `notifications` SET `notif_status`= $status_after WHERE json_extract(`notif_params`, '$.receiver') = '".$account_Id."' AND `notif_status`= $status_before LIMIT $notif_nbr ";

$k11 = mysqli_query($con,$sql);
?>