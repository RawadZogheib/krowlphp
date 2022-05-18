<?php 

    //Insert values into Replies

    $sql="INSERT INTO `replies`(`reply_id`, `account_Id`, `post_id`, `reply_data`, `reply_likes`,`reply_date`) 
    VALUES (NULL,'".$account_Id."','".$post_id."','".$reply_data."',0,'".$reply_date."')";

    $yy=mysqli_query($con,$sql);
    $reply_id = mysqli_insert_id($con);

?>

