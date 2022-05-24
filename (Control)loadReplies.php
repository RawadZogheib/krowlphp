<?php 

//REPLIES
//Loading Replies of a specific post of accounts in then same university via Forum3

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $tot_notifs=0;
    $replies = array();
    $posts = array();
    $tmp = array();
    $t1=0;
    $tot_replies=0;
    
    if(!empty($data->account_Id) && !empty($data->post_id) && !empty($data->currentPage)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $post_id = htmlspecialchars($data->post_id);
        $currentPage = htmlspecialchars($data->currentPage);
        $json_array[0] = 'error4';

         //Getting number of notifications
        require 'Notification/(Model)countNotifications.inc.php';
        if(mysqli_num_rows($k10)>0){
            $res10 =mysqli_fetch_assoc($k10);
            $tot_notifs=$res10["notif_nbr"];
        }

        $json_array[1] = "$tot_notifs";

        require '(Model)countReplies.inc.php';
        if($res5["nbr"]!=0){

        $tot_replies=$res5["nbr"];
        $json_array[2] = $tot_replies;
        
        require '(Model)getPost.inc.php';
        if(mysqli_num_rows($yy)>0){
            $res1 = mysqli_fetch_assoc($yy);
            array_push($posts,$res1["username"],$res1["post_tag"],$res1["post_question"],$res1["post_likes"],$res1["post_date"],$res1["post_context"]);
            
            require "(Model)checklikePosts.inc.php"; //status of the button that has been pressed ( -1->unlike, 0->no button is pressed, 1->like )
            if($res2["nbr"]==0){
              
                array_push($posts,"0");
            }else{
                
                array_push($posts,$res2["post_likes_val"]);
            }
            $json_array[3]=$posts;

        require '(Model)loadReplies.inc.php';
        if(mysqli_num_rows($xx)>0){

            

            while($res = mysqli_fetch_assoc($xx)){	
                $reply_id=$res["reply_id"];
                array_push($tmp,$reply_id,
                                $res["username"],
                                $res["reply_data"],
                                $res["reply_likes"],
                                $res["reply_date"],
                            );
                // array_push($replies,$tmp);
                // $tmp = array();
                
                require "(Model)checklikeReplies.inc.php"; //status of the button that has been pressed ( -1->unlike, 0->no button is pressed, 1->like )
            if($res3["nbr"]==0){
                $t1 = 1;
                array_push($tmp,"0");
            }else{
                $t1 = 1;
                array_push($tmp,$res3["reply_likes_val"]);
            }
            array_push($replies,$tmp);
            $tmp = array();
            }
        }else if(mysqli_num_rows($xx) == 0){
            $t1 = 2;
            $replies = array();
        }
            $json_array[4] =  $replies;

    }
        }else if($res5["nbr"]==0)  {
            $t1=2;
        } 

            if($t1 == 1){
                $json_array[0] = 'success';
            }else if($t1 == 2){
                $json_array[0] = 'empty';
            }
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>