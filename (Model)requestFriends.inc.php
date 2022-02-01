<?php
   if($id1<$id2){
      $sql="INSERT INTO `friendships` (`friendship_id`, `id1`, `id2`, `recent`, `request`, `sender_request`)
       VALUES(NULL, '".$id1."', '".$id2."',0,1,'".$id1."')";

      $yy=mysqli_query($con,$sql);        
   }
   else{
      $sql="INSERT INTO `friendships` (`friendship_id`, `id1`, `id2`, `recent`, `request`, `sender_request`)
       VALUES(NULL, '".$id2."', '".$id1."',0,1,'".$id1."')";
      
      $yy=mysqli_query($con,$sql);        
   }
?>