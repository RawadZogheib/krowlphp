<?php 
require '(Control)versionTest.php'; 

//if(require '(Control)tokenCheck.php'){ 
    
//creating a Post 
$post_array = array();

if(!empty($data->account_Id) && !empty($data->post_subject) && !empty($data->post_question) && !empty($data->post_context)){
  
    $account_Id = htmlspecialchars($data->account_Id);
    $post_tag = htmlspecialchars($data->post_subject);
    $post_question = htmlspecialchars($data->post_question);
    $post_context = htmlspecialchars($data->post_context);
	
    $json_array[0] = 'error4';
    $json_array[1] = 'tokennn';


    require '(Model)config.inc.php';
    $con=con($server);
 
    require '(Model)createPost.inc.php'; 
    if(mysqli_num_rows($yy)>0){
        $res = mysqli_fetch_assoc($yy);
    	
        $json_array[0] = 'success';
        $post_array[] = array(
                            $res["post_tag"],
                            $res["post_question"],
                            //$res["post_context"], 
                            $res["post_val"],
                            $res["post_date"],
                            );
    
    }else{
        $table_array[]=[];
    }

    //$json_array[1] = $token;
    $json_array[2] = $post_array;

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';



//}
?>