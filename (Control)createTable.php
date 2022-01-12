<?php 

//Creating a Table via CreateTable

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
 
if(!empty($data->account_Id) && !empty($data->table_name) && !empty($data->table_uni) && !empty($data->seats)&& !empty($data->table_type)){
    $account_Id = htmlspecialchars($data->account_Id);
    $table_name = htmlspecialchars($data->table_name);
    $table_uni = htmlspecialchars($data->table_uni);
	$seats = htmlspecialchars($data->seats);
    $table_type = htmlspecialchars($data->table_type); //$table_type=1 -> Public OR $table_type=2 -> Private

    $json_array[0] = 'error4';

        require '(Model)nameTableUnique.inc.php'; //Table name is unique 
        if($res["nbr"]==0){

            require '(Model)createTable.inc.php'; 
            if($yy){
                $json_array[0] = 'success';
            }
    
        }else{
            $json_array[0] = 'error10'; //Table name already taken
        }
     
    echo json_encode($json_array);

    mysqli_close($con);

}else require '(View)Error7.php';



}
?>