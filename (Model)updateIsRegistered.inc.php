<?php

    $sql = "UPDATE account
            SET isRegistered = 1
            WHERE account_Id = (SELECT account_Id WHERE email = '".$email."')";

    $yy = mysqli_query($con,$sql);

?>