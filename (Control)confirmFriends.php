<?php 

//NOTIFICATION to be done later 
//Confirm friendship invitation 

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $json_array[0] = 'error4';
    
    if(!empty($data->account_Id) && !empty($data->friend_id)){
        
        $id1 = htmlspecialchars($data->account_Id);
        $id2=htmlspecialchars($data->friend_id);

        require '(Model)checkFriendship.inc.php';
        if($res["nbr"]==1){ 

            require '(Model)confirmFriends.inc.php';
            if(mysqli_affected_rows($con)>0){
                $json_array[0] = 'success';
                $receiver_id = $id2;
                $sender = $id1;
                $notif_type = 42; //4 -> Fouth tab = Students ,  2 -> Confirm Friendship Request 
                require 'Notification/(Control)insertNotification.php';
            }
        }
        
         
        echo json_encode($json_array);

        mysqli_close($con);

    }else require '(View)Error7.php';
}
?>