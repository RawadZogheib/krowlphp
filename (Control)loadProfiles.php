<?php 

//POST
//Loading Posts of accounts in then same university via Forum1

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $replies=array();
    $posts= array();
    $tmp=array();
    $t1=0;
    $nbr_friends=0;
    
    if(!empty($data->account_Id) && !empty($data->friend_id)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $friend_id = htmlspecialchars($data->friend_id);
        $json_array[0] = 'error4';

        if($friend_id != 0){
            $account_Id=$friend_id;
        }
            require "(Model)loadFriends.inc.php"; //number of friends
            $nbr_friends=mysqli_num_rows($xx);
            $json_array[1] = $nbr_friends;
            
                require "(Model)getAccountPosts.inc.php";
                if(mysqli_num_rows($xx2)>0){

                    while($res2 = mysqli_fetch_assoc($xx2)){	
                        array_push($tmp,$res2["post_id"],
                                        $res2["post_tag"],
                                        $res2["post_question"],
                                        $res2["post_likes"],
                                        $res2["post_date"],
                                        $res2["post_context"],
                                    );   
                        array_push($posts,$tmp);
                        $tmp=array();                    
                    }
                    $json_array[2] = $posts;
                }else if(mysqli_num_rows($xx2) == 0){
                    $posts = array();
                    $json_array[2] = $posts;
                }
                

                    require "(Model)getAccountReplies.inc.php";
                    if(mysqli_num_rows($xx3)>0){
                        $json_array[0] = 'success';
                        $tmp=array(); 
            
                        while($res3 = mysqli_fetch_assoc($xx3)){	
                            array_push($tmp,$res3["reply_id"],
                                            $res3["reply_data"],
                                            $res3["reply_likes"],
                                            $res3["reply_date"]
                                        );   
                            array_push($replies,$tmp);
                            $tmp=array();                    
                        }
                        $json_array[3] = $replies;

                    }else if(mysqli_num_rows($xx3) == 0){
                        $json_array[0] = 'success';
                        $replies=array();
                        $json_array[3] = $replies;
                    }
        
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>