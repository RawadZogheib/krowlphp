<?php 

//POST
//adding like to Posts of accounts in then same university via Forum1

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    if(!empty($data->account_Id) && !empty($data->post_id)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $post_id = htmlspecialchars($data->post_id);
        
        require '(Model)likePosts.inc.php';
        if($xx){
            $json_array[0] = 'success';
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