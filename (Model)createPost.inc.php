<?php 

    //Insert values into Posts

    $sql="INSERT INTO `posts`(`post_id`, `account_Id`, `post_question`, `post_context`, `post_likes`, `post_tag`) 
    VALUES (NULL,'".$account_Id."','".$post_question."','".$post_context."',0,'".$post_tag."')";

    $yy=mysqli_query($con,$sql);

?>

