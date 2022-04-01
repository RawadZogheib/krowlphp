<?php

    $sql = "SELECT `vCode` as vCode FROM `account` WHERE `account_Id` = '".$account_Id."'";

    $k1 = mysqli_query($con,$sql);
    

?>