<?php //Delete the occupant that left the meeting

   $sql="DELETE FROM `occupants` WHERE `account_Id`='".$account_Id."' AND `table_id`='".$table_id."'";
    $yy=mysqli_query($con,$sql);
  
 
?>