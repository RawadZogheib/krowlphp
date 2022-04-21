<?php 
    $sql="UPDATE `account` SET 
    `".$key."`='".$val."'
    WHERE `account_Id`='".$account_Id."'";

    $yy=mysqli_query($con,$sql);
    
?>