<?php

$sql="SELECT count(*)as notif_nbr FROM `notifications` WHERE json_extract(`notif_params`, '$.receiver') = '".$account_Id."' AND `notif_status`=0 
UNION SELECT `photo` FROM `account` WHERE `account_Id` ='".$account_Id."'";

$k10 = mysqli_query($con,$sql);



?>