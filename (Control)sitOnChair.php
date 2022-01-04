<?php 
require '(Control)versionTest.php';
if(require '(Control)tokenCheck.php'){
   

if(!empty($data->user_id) && !empty($data->table_name) && !empty($data->position)){
    
    $user_id = htmlspecialchars($data->user_id);
    $table_name = htmlspecialchars($data->table_name);
	$position = htmlspecialchars($data->position);

    $json_array[0] = 'error4';
    $json_array[1] = $token;

    require '(Model)checkNbrSeats.inc.php';
    $table_id =$res["table_id"];
    require '(Model)checkNbrOccupants.inc.php';

    if($res1["nbr"]>=$res["seats"]){
        $json_array[0] = 'error8'; //Full Table
    }
    else{ //there's available places
        require '(Model)checkPosition.inc.php';
    
        if($res["nbr"]==0){
            
            require '(Model)insertPosition.inc.php';
            $json_array[0] = 'success';
       }else{
        $json_array[0] = 'error9'; //Position Taken
        }
    }
    
    echo json_encode($json_array);

    mysqli_close($con);


}else require '(View)Error7.php';
}

?>