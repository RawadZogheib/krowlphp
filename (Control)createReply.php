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
            $json_array[0] = 'success';
            $json_array[1] = "$reply_id";

            //Insert Notification
            require '(Model)getPost.inc.php';
            if(mysqli_num_rows($yy)>0){

                $res = mysqli_fetch_assoc($yy);
                $receiver_id=$res["account_Id"];
                $sender=$account_Id;
                if($receiver_id != $sender){
                    $notif_type=31; //3 -> third tab = Forum ,  1 -> Creating a Reply (or Post if we  want to add this feature later)
                    require 'Notification/(Control)insertNotification.php';
                }

                
            }	


        }

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';


}
?>