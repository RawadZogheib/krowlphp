<?php

    $sql = "SELECT `account_Id` as account_Id FROM `account` WHERE `email` = '".$email."'";

    $g1 = mysqli_query($con,$sql);
    $gg1 = mysqli_fetch_assoc($g1);

?>