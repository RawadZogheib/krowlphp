<?php 

//Getting the occupants of an existing table via Library

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    
    $table_array = array();
    $t1=0;
    
    if(!empty($data->table_name)){
        
        $table_name = htmlspecialchars($data->table_name);
        require '(Model)loadOccupants.inc.php';


        if(mysqli_num_rows($xx)>0){
            $t1 = 1;
            while($res = mysqli_fetch_assoc($xx)){	

                $table_array[] = array($res["account_Id"],$res["username"],$res["position"],"batikhh");
            }	
        }else  if(mysqli_num_rows($xx) == 0){
            $t1 = 2;
            $table_array[]=[];
        }else{
            
        }
                    
            $json_array[0] = 'error4';
            $json_array[1] = $table_array;

            if($t1 == 1){
                $json_array[0] = 'success';
            }else if($t1 == 2){
                $json_array[0] = 'empty';
            }
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>
