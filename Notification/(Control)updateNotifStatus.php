<?php 


require '../(Control)versionTest.php'; 
if(require '../(Control)tokenCheck.php'){

    
    if(!empty($data->account_Id) && !empty($data->notif_id) && !empty($data->status_after)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $notif_id = htmlspecialchars($data->notif_id);
        $status_before=1; //remove it from $sql
        $status_after=htmlspecialchars($data->status_after);
        $json_array[0] = 'error4';
        
     

        
        require '(Model)updateNotifStatus2.inc.php';
        if(mysqli_affected_rows($con)>0){            $json_array[0] = 'success';
        }else if(mysqli_affected_rows($con)==0)  {
            $json_array[0] = 'success';
        }   
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '../(View)Error7.php';
}
?>