<?php 

//POST
//adding like & unlike to Posts of accounts in then same university via Forum1

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    if(!empty($data->account_Id) && !empty($data->post_id)&& !empty($data->like_val)){
        $json_array[0] = 'error4';
        $account_Id = htmlspecialchars($data->account_Id);
        $post_id = htmlspecialchars($data->post_id);
        $like_val = htmlspecialchars($data->like_val);


        require '(Model)checklikePosts.inc.php';
        if($res2["nbr"]==0){ 
        require '(Model)addlikePosts.inc.php';
        if($xx){
            $json_array[1] = $like_val; //status of the button that has been pressed ( -1->unlike, 0->no button is pressed, 1->like )
        } 
        }else{
            if($res2["post_likes_val"]==$like_val){
                require '(Model)deletelikePosts.inc.php';
                if($xx){
                    $json_array[1] = "0"; 
                }  
            }else{ 
                require '(Model)updatelikePosts.inc.php';
                if($xx){
                    $json_array[1] = $like_val; 
                }
            }

        }

    if($xx){
        require '(Model)selectlikePosts.inc.php';
         if(mysqli_num_rows($yy)>0){
        $res1 = mysqli_fetch_assoc($yy);
        $json_array[0] = 'success';
        $json_array[2] = $res1["post_likes"];  //total likes on a post

        }
    }   

    echo json_encode($json_array);

    mysqli_close($con);

    }else require '(View)Error7.php';
}
?>