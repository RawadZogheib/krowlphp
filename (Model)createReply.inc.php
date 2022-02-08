<?php 

    //Insert values into Replies

    $sql="INSERT INTO `replies`(`reply_id`, `account_Id`, `post_id`, `reply_data`, `reply_likes`) 
    VALUES (NULL,'".$account_Id."','".$post_id."','".$reply_data."',0)";

    $yy=mysqli_query($con,$sql);

?>

