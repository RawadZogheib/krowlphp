<?php 

    //Insert into Occupants

    $sql="INSERT INTO `occupants`(`occupant_id`, `table_id`, `account_Id`, `inviter_id`, `position`)
    VALUES (NULL,'".$table_id."','".$account_Id."',0,'".$position."')";

    $xx = mysqli_query($con,$sql);

?>