<?php 

    //Insert values into Tables 
    //PS: I should do just one model for table public/private with a variable $table_type  (todo)

    $sql="INSERT INTO `tables`(`table_id`, `admin_id`, `table_name`,`table_uni`,`seats`, `table_type`)
    VALUES (NULL,'".$account_Id."','".$table_name."','".$table_uni."','".$seats."','".$table_type."')";

    $yy=mysqli_query($con,$sql);
    $table_id = mysqli_insert_id($con);

?>