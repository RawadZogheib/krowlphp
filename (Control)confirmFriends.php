<?php 

//NOTIFICATION to be done later 
//Confirm friendship invitation 

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    
    if(!empty($data->account_Id) && !empty($data->friend_id)){
        
        $id1 = htmlspecialchars($data->account_Id);
        $id2=htmlspecialchars($data->friend_id);

        require '(Model)confirmFriends.inc.php';
        if($yy){
            $json_array[0] = 'success';
        }


        $json_array[0] = 'error4';
         
        echo json_encode($json_array);

        mysqli_close($con);

    }else require '(View)Error7.php';
}
?>