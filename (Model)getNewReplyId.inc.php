<?php 

    $sql="SELECT `reply_id` FROM `replies` WHERE `account_Id`='".$account_Id."' AND `post_id`='".$post_id."' 
    AND `reply_data`='".$reply_data."' AND `reply_date`='".$reply_date."'";

    $zz=mysqli_query($con,$sql);
?>
