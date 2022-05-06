<?php //Delete the occupant that left the meeting

   $sql="DELETE FROM `occupants` WHERE `account_Id`='".$account_Id."' AND `table_id`='".$table_id."'";
    $yy=mysqli_query($con,$sql);
  
    //header("Location: http://www.google.com/");
    //echo "<script>window.close();</script>";
?>

<!-- <script type="text/javascript">
    window.close();
</script> -->