<?php 

//Creating a Post via Forum2

require '../(Control)versionTest.php'; 
if(require '../(Control)tokenCheck.php'){ 
    
if(!empty($data->account_Id)){
  
    $receiver_id = htmlspecialchars($data->account_Id);
    $json_array[0] = 'error4';

    $notif_nbr= 0;
    require '(Model)updateNotifNbr.inc.php';
    if(mysqli_affected_rows($con)>0){
        $json_array[0] = 'success';
    }

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';


}
?>