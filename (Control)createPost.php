<?php 

//Creating a Post via Forum2

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
if(!empty($data->account_Id) && !empty($data->post_subject) && !empty($data->post_question) && !empty($data->post_context)){
  
    $account_Id = htmlspecialchars($data->account_Id);
    $post_tag = htmlspecialchars($data->post_subject);
    $post_question = htmlspecialchars($data->post_question);
    $post_context = htmlspecialchars($data->post_context);
	
    $json_array[0] = 'error4';

    require '(Model)createPost.inc.php'; 
    if($yy){
        $json_array[0] = 'success';
    }

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';


}
?>