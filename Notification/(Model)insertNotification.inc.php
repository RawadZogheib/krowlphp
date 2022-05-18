<?php

    //Insert Notification

    $sql="INSERT INTO `notifications`(`notif_id`, `notif_sender`, `notif_params`, `notif_type`)
          VALUES (NULL,$sender,$params,$notif_type)";

    $yy=mysqli_query($con,$sql);



?>