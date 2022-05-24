<?php 

//STUDENTS
//Request friendship invitation 

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $json_array[0] = 'error4';
    if(!empty($data->account_Id) && !empty($data->friend_id)){
        
        $id1 = htmlspecialchars($data->account_Id);
        $id2=htmlspecialchars($data->friend_id);

        require '(Model)checkFriendship.inc.php';
        if($res["nbr"]==0){ 
            require '(Model)requestFriends.inc.php';
            if(mysqli_affected_rows($con)>0){
                $json_array[0] = 'success';
                $receiver_id = $id2;
                $sender = $id1;
                $notif_type = 41; //4 -> Fourth Tab = Students and Student Profile, 1 -> Request Friendship
                require 'Notification/(Control)insertNotification.php';
            }
        }
       
        echo json_encode($json_array);

        mysqli_close($con);

    }else require '(View)Error7.php';
}
?>