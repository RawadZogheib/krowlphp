<?php 
require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
//creating a table 
if(!empty($data->account_Id) && !empty($data->table_name) && !empty($data->table_uni) && !empty($data->seats)&& !empty($data->table_type)){
    $account_Id = htmlspecialchars($data->account_Id);
    $table_name = htmlspecialchars($data->table_name);
    $table_uni = htmlspecialchars($data->table_uni);
	$seats = htmlspecialchars($data->seats);
    $table_type = htmlspecialchars($data->table_type); //no one can access it without an invitation

    $json_array[0] = 'error4';
    $json_array[1] = $token;

if($table_type =='1'){ // public 
    require '(Model)tablePublic.inc.php'; 
    if($yy){
        $json_array[0] = 'success';
    }

}else if($table_type =='2'){
    require '(Model)tablePrivate.inc.php'; 
    if($yy){
        $json_array[0] = 'success';
    }
}

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';



}
?>