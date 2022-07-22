<?php 

//used for load Pages
require '../(Control)versionTest.php'; 
if(require '../(Control)tokenCheck.php'){


    if(!empty($data->account_Id)){

        $account_Id = htmlspecialchars($data->account_Id);
        $notifandprof=0;
        $json_array[0] = 'error4';

        require '(Model)countNotifications.inc.php';
        if(mysqli_num_rows($k10)>0){
            $json_array[0]='success';
            while($res10 = mysqli_fetch_assoc($k10)){
                $notifandprof=$res10["notif_nbr"];
               
                array_push($table1,"$notifandprof");
               
            }
        
            
        }
        
        $json_array[1] = $table1;
        
        echo json_encode($json_array);

        mysqli_close($con);





    }else require '../(View)Error7.php';

    }
?>