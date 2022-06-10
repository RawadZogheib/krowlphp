<?php 

//STUDENTS
//Cancel friendship invitation 

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $json_array[0] = 'error4';
    if(!empty($data->account_Id) && !empty($data->friend_id)){
        
        $id1 = htmlspecialchars($data->account_Id);
        $id2=htmlspecialchars($data->friend_id);

        require '(Model)checkFriendship.inc.php';
        if($res["nbr"]==1){ 
            $request=$res["request"];
            $sender_request=$res["sender_request"];
            require '(Model)cancelFriends.inc.php';
            if(mysqli_affected_rows($con)>0){
                $json_array[0] = 'success';
                if($request == 1){
                    
                    $receiver_id = $id1;
                    $sender = $id2;
                
                    $notif_type = 43; // Students & Student Profile, Cancel Friendship Request
                    require 'Notification/(Control)insertNotification.php';

                }

            }
        }
         
        echo json_encode($json_array);

        mysqli_close($con);

    }else require '(View)Error7.php';
}
?>