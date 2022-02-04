<?php 

//REPLY
//adding like & unlike to Replies of Post of accounts in then same university via Forum1

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    if(!empty($data->account_Id) && !empty($data->post_id) && !empty($data->reply_id) && !empty($data->like_val)){
        $json_array[0] = 'error4';
        $account_Id = htmlspecialchars($data->account_Id);
        $post_id = htmlspecialchars($data->post_id);
        $reply_id = htmlspecialchars($data->reply_id);
        $like_val = htmlspecialchars($data->like_val);


        require '(Model)checklikeReplies.inc.php';
        if($res3["nbr"]==0){ 
        require '(Model)addlikeReplies.inc.php';
        $json_array[0] = 'success1';
        }else{
            require '(Model)updatelikeReplies.inc.php';
            $json_array[0] = 'success1';
        }

    if($xx){
        require '(Model)selectlikePosts.inc.php';
         if(mysqli_num_rows($yy)>0){
        $res1 = mysqli_fetch_assoc($yy);
        $json_array[1] = $res1["reply_likes"]; 

        require "(Model)checklikePosts.inc.php";
        if($res2["nbr"]==0){
            $json_array[2] = '0';
        }else{
            $json_array[2] = $res2["post_likes_val"]; //sending number of likes of the post taht we're commenting it 
        }
        array_push($posts_array,$table1);
        $table1=array();
        }	
        $json_array[0] = 'success2';
        }
    }   

    echo json_encode($json_array);

    mysqli_close($con);

    }else require '(View)Error7.php';
}
?>