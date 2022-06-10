<?php 

//STUDENTS
//Request friendship invitation 

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $json_array[0] = 'error4';
    if(!empty($data->account_Id) && !empty($data->friend_id)){
        
        $id1 = htmlspecialchars($data->account_Id);
        $id2=htmlspecialchars($data->friend_id);
        $infos=array();
        $nbr_friends=0;

        require '(Model)checkFriendship.inc.php';
        if($res["nbr"]==0){ 
            require '(Model)requestFriends.inc.php';
            if(mysqli_affected_rows($con)>0){

                $json_array[0] = 'success';
                $account_Id=$id2;

                require "(Model)getAccountInfos.inc.php";
                if(mysqli_num_rows($xx6)>0){
                $res6 = mysqli_fetch_assoc($xx6);	
                    array_push($infos,$res6["username"],
                                    $res6["uni_name"],
                                    $res6["bio"],
                                    //$res6["photo"]
                                );   
                require "(Model)loadFriends.inc.php";
                    $nbr_friends=mysqli_num_rows($xx);
                    array_push($infos,"$nbr_friends");
                    $initial=$id1;
                    require "(Model)isFriendProfile.inc.php";
            if(mysqli_num_rows($yy7)>0){ //to be added control if it's less than 0 what's gonna hppen

            $res7 = mysqli_fetch_assoc($yy7);
            if($res7["nbr"] == 1){
                
                if($res7["request"]==1)// 1 -> REQUEST OR 2 -> FRIEND IN DB 
                array_push($infos,'1');  //1 -> REQUEST
                else if($res7["request"]==2)
                array_push($infos,'2');// 2 -> FRIEND 
            }else{

                array_push($infos,'0'); // 0 -> this student is not a friend with the account_Id , UNFRIEND
            }

                }

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
}
?>