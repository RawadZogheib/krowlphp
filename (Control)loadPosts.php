<?php 

//POST
//Loading Posts of accounts in then same university via Forum1

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $posts_array = array();
    $t1=0;
    
    if(!empty($data->account_Id) && !empty($data->user_uni)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $user_uni = htmlspecialchars($data->user_uni);
        
        require '(Model)loadPosts.inc.php';
        if(mysqli_num_rows($xx)>0){
           
            $t1 = 1;
            while($res = mysqli_fetch_assoc($xx)){	
                $post_id=$res["post_id"];
                $posts_array[] = array($post_id,
                                    $res["username"],
                                    $res["post_tag"],
                                    $res["post_question"],
                                    $res["post_likes"],
                                    $res["post_date"],
                                    $res["post_context"],
                                    );
            require "(Model)checklikePosts.inc.php";
            if($res2["nbr"]==0){
                array_push($posts_array,0);
            }else{
                array_push($posts_array,$res2["post_likes_val"]);
            }
                
            }	
        }else{
            $posts_array[]=[];
        }
                    
            $json_array[0] = 'error4';
            $json_array[1] =  $posts_array;
            

            if($t1 == 1){
                $json_array[0] = 'success';
            }
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>