<?php 

//Removing a Table via Admin

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
if(!empty($data->account_Id) && !empty($data->table_id)){
  
    $account_Id = htmlspecialchars($data->account_Id);
    $table_id = htmlspecialchars($data->table_id);

    $json_array[0] = 'error4';

    require '(Model)checkisUserAvailable.inc.php';

    if($res6["nbr"] == 1 && $res6["occupant_video"] == 0 ){

        require '(Model)removeOccupant.inc.php'; 
        if($yy){
            $json_array[0] = 'success';
        }

    }else{
        $json_array[0] = 'error417';
    }



        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';


}
?>