<?php 

//Checking a specific position in Table if it's taken or not via CustomTable

require '(Control)versionTest.php';
if(require '(Control)tokenCheck.php'){
   

if(!empty($data->account_Id) && !empty($data->table_name) && !empty($data->position)){
    
    $account_Id = htmlspecialchars($data->account_Id);
    $table_name = htmlspecialchars($data->table_name);
	$position = htmlspecialchars($data->position);

    $json_array[0] = 'error4';
    require "(Model)checkisUserAvailable.inc.php";
    if($res6["nbr"]==0){
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
        


    }else{
        $json_array[0] = 'error410';
    }
    echo json_encode($json_array);
    
    mysqli_close($con);


}else require '(View)Error7.php';
}

?>