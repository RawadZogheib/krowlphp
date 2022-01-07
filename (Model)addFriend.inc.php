<?php

   $sql="SELECT count(*)as nbr FROM `friends` WHERE `id1` = '".$id1."' AND `id2` = '".$id2."' OR `id1` = '".$id2."' AND `id2` = '".$id1."'";

   $xx = mysqli_query($con,$sql);
   $res = mysqli_fetch_assoc($xx); 

   if($res["nbr"]==0){ 
   if($id1<$id2){
      $sql="INSERT INTO `friends` (`friend_id`, `id1`, `id2`) VALUES(NULL, '".$id1."', '".$id2."')";

      $yy=mysqli_query($con,$sql);        
   }
   else{
      $sql="INSERT INTO `friends` (`friend_id`, `id1`, `id2`) VALUES(NULL, '".$id2."', '".$id1."')";
      
      $yy=mysqli_query($con,$sql);        
   }
   }

?>