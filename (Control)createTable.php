<?php 

//Creating a Table via CreateTable

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
 
if(!empty($data->account_Id) && !empty($data->table_name) && !empty($data->table_uni) && !empty($data->seats) && !empty($data->table_type) && !empty($data->table_type2)){
    $account_Id = htmlspecialchars($data->account_Id);
    $table_name = htmlspecialchars($data->table_name);
    $table_uni = htmlspecialchars($data->table_uni);
	$seats = htmlspecialchars($data->seats);
    $table_type = htmlspecialchars($data->table_type); //$table_type=1 -> Public OR $table_type=2 -> Private
    $table_type2 = htmlspecialchars($data->table_type2); //$table_type2=1 -> Quiet OR $table_type2=2 -> Silent
    $json_array[0] = 'error4';

        require '(Model)nameTableUnique.inc.php'; //Table name is unique //TODO: using in my model INSERT IGNORE INTO 
        if($res["nbr"]==0){
            if($table_type == 2){
                $pass=uniqid(); // generate a unique ID 
            }else{
                $pass=0;
            }
            require '(Model)createTable.inc.php'; 
            if($yy){

                if($table_type == "2"){
                    $friend_id=$account_Id;
                    require '(Model)addParticipants.inc.php'; //inserting the creator of the table in the participant table 
                    if($zz){
                        $json_array[0] = 'success';
                        $json_array[1] = "$table_id";
                        $json_array[2]= base64_encode($table_id.'-'.$pass);
                    }
                    
                }else{
                    $json_array[0] = 'success';
                    $json_array[1] = "$table_id";
                }
               
            }
    
        }else{
            $json_array[0] = 'error10'; //Table name already taken
        }
     
    echo json_encode($json_array);

    mysqli_close($con);

}else require '(View)Error7.php';



}
?>