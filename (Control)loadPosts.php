<?php 
//CHAT
//loading the recent contacts in chat section (PS:the contacts and friends should be from the same uni but we will add this restriction in add friend section)
//PS:Contacts are the friends that the user has been talking with recently

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $posts_array = array();
    $t1=0;
    
    if(!empty($data->user_id) && !empty($data->user_uni)){
        
        $user_id = htmlspecialchars($data->user_id);
        $user_uni = htmlspecialchars($data->user_uni);
        
        require '(Model)loadPosts.inc.php';
        if(mysqli_num_rows($xx)>0){
            $t1 = 1;
            while($res = mysqli_fetch_assoc($xx)){	
                $posts_array[] = array($res["post_id"],
                                    $res["username"],
                                    $res["post_tag"],
                                    $res["post_data"],
                                    $res["post_val"],
                                    $res["post_date"],
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