<?php //Delete the occupant that left the meeting
	require '(Model)config.inc.php';
   $con=con("krowl");
   $sql="DELETE FROM `occupants` WHERE `account_Id`=(SELECT `account_Id` FROM `account` WHERE `username`='".$nameLeft."')";
    $yy=mysqli_query($con,$sql);
  
    //header("Location: http://www.google.com/");
    //echo "<script>window.close();</script>";
?>

<!-- <script type="text/javascript">
    window.close();
</script> -->