<?php 

//REPLIES
//Loading Replies of a specific post of accounts in then same university via Forum3

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $replies = array();
    $tmp = array();
    $t1=0;
    
    if(!empty($data->account_Id) && !empty($data->post_id)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $post_id = htmlspecialchars($data->post_id);
        
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
                    
            $json_array[0] = 'error4';
            $json_array[1] =  $replies;
            

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