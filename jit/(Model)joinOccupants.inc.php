<?php //insert the occupant that join the meeting
echo "JOINN";
	require '../(Model)config.inc.php';
   $con=con("krowl");
   $sql="INSERT INTO `jit`(`jit_id`, `jit_name`) VALUES(NULL,'".$nameJoined."')";
    $yy=mysqli_query($con,$sql);
  
    //header("Location: http://www.google.com/");
    //echo "<script>window.close();</script>";
?>

<!-- <script type="text/javascript">
    window.close();
</script> -->