<?php

$sql="SELECT count(*)as nbr FROM `friendships` WHERE `id1` = '".$id1."' AND `id2` = '".$id2."' OR `id1` = '".$id2."' AND `id2` = '".$id1."'";

$xx = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($xx); 

if($res["nbr"]==0){ 
   if($id1<$id2){
      $sql="INSERT INTO `friendships` (`friendship_id`, `id1`, `id2`, `recent`, `request`, `sender_request`,`date_accept`)
       VALUES(NULL, '".$id1."', '".$id2."',0,1,'".$id1."',NULL)";

      $yy=mysqli_query($con,$sql);        
   }
   else{
      $sql="INSERT INTO `friendships` (`friendship_id`, `id1`, `id2`, `recent`, `request`, `sender_request`, `date_request`, `date_accept`)
       VALUES(NULL, '".$id2."', '".$id1."',0,1,'".$id1."',NULL)";
      
      $yy=mysqli_query($con,$sql);        
   }
}
?>