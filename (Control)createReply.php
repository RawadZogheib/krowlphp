<?php 

//Creating a Reply via Forum3

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
if(!empty($data->account_Id) && !empty($data->post_id) && !empty($data->reply_data) && !empty($data->reply_date)){
  
    $account_Id = htmlspecialchars($data->account_Id);
    $post_id = htmlspecialchars($data->post_id);
    $reply_data = htmlspecialchars($data->reply_data);
    $reply_date = htmlspecialchars($data->reply_date);
	
    $json_array[0] = 'error4';

    require '(Model)createReply.inc.php'; 
    if($yy){
        require '(Model)getNewReplyId.inc.php';
        if(mysqli_num_rows($zz)>0){
            $res = mysqli_fetch_assoc($zz);
            $json_array[0] = 'success';
            $json_array[1] = $res["reply_id"];
        }
    }

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';


}
?>