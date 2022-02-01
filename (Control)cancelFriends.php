<?php 

//STUDENTS
//Cancel friendship invitation or when I want to Unfriend a user or to Stop the request friendship invitation

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $json_array[0] = 'error4';
    if(!empty($data->account_Id) && !empty($data->friend_id)){
        
        $id1 = htmlspecialchars($data->account_Id);
        $id2=htmlspecialchars($data->friend_id);

        require '(Model)cancelFriends.inc.php';
        if($yy){
            $json_array[0] = 'success';
        }


       
         
        echo json_encode($json_array);

        mysqli_close($con);

    }else require '(View)Error7.php';
}
?>