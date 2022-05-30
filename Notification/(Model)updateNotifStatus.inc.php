<?php
// 0 -> user didn't open the ring bell
// 1 -> user opened the ring bell but didn't click on any the notification
// 2 -> user opened the ring bell & click on one the notification 

$sql = " UPDATE `notifications` SET `notif_status`= $status_after WHERE json_extract(`notif_params`, '$.receiver') = '".$account_Id."' AND `notif_status`= $status_before ";


?>