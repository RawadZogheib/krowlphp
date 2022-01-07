<?php 

    //Insert values into Tables

    $sql="INSERT INTO `tables`(`table_id`, `admin_id`, `table_name`,`table_uni`, `seats`, `table_type`)
    VALUES (NULL,'".$account_Id."','".$table_name."','".$table_uni."','".$seats."',2)";

    $yy=mysqli_query($con,$sql);
    
?>