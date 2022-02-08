<?php 

//REPLIES
//Loading Replies of a specific post of accounts in then same university via Forum3

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $replies = array();
    $t1=0;
    
    if(!empty($data->account_Id) && !empty($data->post_id)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $post_id = htmlspecialchars($data->post_id);
        
        require '(Model)loadReplies.inc.php';
        if(mysqli_num_rows($xx)>0){
            $t1 = 1;
            while($res = mysqli_fetch_assoc($xx)){	
                array_push($replies,$res["reply_id"],
                                    $res["username"],
                                    $res["reply_data"],
                                    $res["reply_likes"],
                                    $res["reply_date"],
                                    );
            }	
        }else{
            $table_array[]=[];
        }
                    
            $json_array[0] = 'error4';
            $json_array[1] =  $replies;
            

            if($t1 == 1){
                $json_array[0] = 'success';
            }
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>