<?php 

//Creating a Reply via Forum3

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
if(!empty($data->account_Id) && !empty($data->post_id) && !empty($data->reply_data)){
  
    $account_Id = htmlspecialchars($data->account_Id);
    $post_id = htmlspecialchars($data->post_id);
    $reply_data = htmlspecialchars($data->reply_data);

	
    $json_array[0] = 'error4';

    require '(Model)createReply.inc.php'; 
    if($yy){
        $json_array[0] = 'success';
    }

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';


}
?>