<?php 
//CHAT
//loading the recent contacts in chat section (PS:the contacts and friends should be from the same uni but we will add this restriction in add friend section)
//PS:Contacts are the friends that the user has been talking with recently

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $posts_array = array();
    $t1=0;
    
    if(!empty($data->user_id)){
        
        $user_id = htmlspecialchars($data->user_id);
        
        require '(Model)loadPosts.inc.php';
        if(mysqli_num_rows($xx)>0){
            $t1 = 1;
            while($res = mysqli_fetch_assoc($xx)){	
                $posts_array[] = array($res1["post_id"],
                                    $res2["username"],
                                    $res1["post_data"],
                                    $res1["post_val"],
                                    $res1["post_date"],
                                    );
            }	
        }else{
            $table_array[]=[];
        }
                    
            $json_array[0] = 'error4';
            $json_array[1] = $token;
            $json_array[2] = $posts_array;

            if($t1 == 1){
                $json_array[0] = 'success';
            }
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>