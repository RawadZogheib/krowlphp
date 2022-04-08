<?php 
    $sql="UPDATE `account` SET 
    `email`='".$email."',
    `first_name`='".$fname."',
    `last_name`='".$lname."',
    `username`='".$username."',
    `date_of_birth`='".$date_of_birth."',
    `bio`='".$bio."',
    `university_ids`='".$uni."',
    `major_degree_ids`='".$major."',
    `minor_degree_ids`='".$minor."'";

    $yy=mysqli_query($con,$sql);
    
?>