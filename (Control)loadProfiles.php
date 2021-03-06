<?php 

//PROFILE

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $tot_notifs=0;
    $replies=array();
    $posts= array();
    $infos= array();
    $tmp=array();
    $table1 = array();
    $t1=0;
    $t2=0;
    $initial=0;
    $nbr_friends=0;
    
    if(!empty($data->account_Id)){
        $account_Id = htmlspecialchars($data->account_Id); //if the user is viewing his own profile 
        $json_array[0] = 'error4';
        
 
         //Getting number of notifications
         require 'Notification/(Model)countNotifications.inc.php';
         if(mysqli_num_rows($k10)>0){
             $json_array[0]='success';
             while($res10 = mysqli_fetch_assoc($k10)){
                 $notifandprof=$res10["notif_nbr"];
                
                 array_push($table1,"$notifandprof");
                
            }
         
             
         }
 
         $json_array[1] = $table1;
        

        if(!empty($data->userId)){
            $friend_id = htmlspecialchars($data->userId);
            $initial=$account_Id; //saving the initial id of initial user before changing it to student_id
            $account_Id=$friend_id; //if the user is viewing a student profile 
            $t2=1; // to execute isFriend function
        }
        
            require "(Model)getAccountInfos.inc.php";
            if(mysqli_num_rows($xx6)>0){
                    $res6 = mysqli_fetch_assoc($xx6);	
                    array_push($infos,$res6["first_name"],
                                    $res6["last_name"],
                                    $res6["uni_name"],
                                    $res6["bio"],
                                    $res6["photo"]
                                );   

            require "(Model)loadFriends.inc.php"; //number of friends
            $nbr_friends=mysqli_num_rows($xx);
            array_push($infos,"$nbr_friends");

            if($t2 == 1){
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
            $json_array[2] = $infos;
            }
            }else{
                array_push($infos,"3"); //not to add any button (requested, friend)
                $json_array[2] = $infos;
    
            }
          
                require "(Model)getAccountPosts.inc.php";
                if(mysqli_num_rows($xx2)>0){

                    while($res4 = mysqli_fetch_assoc($xx2)){	
                        $post_id= $res4["post_id"];
                        array_push($tmp,$res4["post_id"],
                                        $res4["username"],
                                        $res4["post_tag"],
                                        $res4["post_likes"],); 
                        
                        require "(Model)checklikePosts.inc.php"; //status of the button that has been pressed ( -1->unlike, 0->no button is pressed, 1->like )
                        if($res2["nbr"]==0){
                            array_push($tmp,"0");
                        }else{
                            array_push($tmp,$res2["post_likes_val"]);
                        }
                        array_push($tmp,$res4["post_question"]);
                        array_push($tmp,$res4["post_context"]);
                                      
                         require "(Model)countReplies.inc.php";
                        array_push($tmp,$res5["nbr"],$res4["post_date"]);
                        array_push($posts,$tmp);
                        $tmp=array();                    
                    }
                    $json_array[3] = $posts;
                }else if(mysqli_num_rows($xx2) == 0){
                    $posts = array();
                    $json_array[3] = $posts;
                }
                

                    require "(Model)getAccountReplies.inc.php";
                    if(mysqli_num_rows($xx3)>0){
                        $json_array[0] = 'success';
                        $tmp=array(); 
                        
                        while($res3 = mysqli_fetch_assoc($xx3)){
                            $post_id= $res3["post_id"];
                            array_push($tmp,$post_id,
                                            $res3["reply_id"],
                                            $res3["username"],
                                            $res3["post_tag"],
                                            $res3["post_likes"],); 

                            require "(Model)checklikePosts.inc.php"; //status of the button that has been pressed ( -1->unlike, 0->no button is pressed, 1->like )
                            if($res2["nbr"]==0){
                                
                                array_push($tmp,"0");
                            }else{
                                
                                array_push($tmp,$res2["post_likes_val"]);
                            }
                            array_push($tmp,$res3["post_question"],$res3["post_context"],$res3["post_date"],$res3["reply_data"],$res3["reply_date"]);
                            array_push($replies,$tmp);
                            $tmp=array();                    
                        }
                        $json_array[4] = $replies;

                    }else if(mysqli_num_rows($xx3) == 0){
                        $json_array[0] = 'success';
                        $replies=array();
                        $json_array[4] = $replies;
                    }
                }
            
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>