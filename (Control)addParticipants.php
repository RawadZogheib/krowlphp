<?php 


require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
if(!empty($data->account_Id) && !empty($data->friend_id) && !empty($data->table_id)){
  
    $account_Id = htmlspecialchars($data->account_Id);
    $friend_id = htmlspecialchars($data->friend_id);
    $table_id = htmlspecialchars($data->table_id);

	
    $json_array[0] = 'error4';

    require '(Model)inviteParticipants.inc.php'; 
    if($zz){
            $json_array[0] = 'success';
            //$json_array[1] = "$id";
    }

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';


}
?>