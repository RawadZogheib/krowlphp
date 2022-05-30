<?php 
    $status_before = 0;
    $status_after = 1;
    require '(Model)updateNotifStatus.inc.php';
    if(mysqli_affected_rows($con)>0){

        $json_array[0] = 'success';

    }else if(mysqli_affected_rows($con) == -1){
        $json_array[0] = 'error4';
    }

?>