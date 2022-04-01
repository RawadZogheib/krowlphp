<?php
    $sql = "UPDATE `account`
    SET `password` = '".$hash."'
    WHERE `account_Id`= '".$account_Id."'";

    $uu = mysqli_query($con,$sql);


?>