<?php 

    //Insert values into Replies
    require '../(Model)config.inc.php';
    $con=con("krowl");
    $sql="SELECT `isSilent` FROM `tables` WHERE `table_name`='".$_GET['table']."'";

    $yy=mysqli_query($con,$sql);


?>

