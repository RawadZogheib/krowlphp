<?php 
 
 //SETTINGS 

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){
 
    if(!empty($data->account_Id)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $tot_notifs=0;
        $json_array[0] = 'error4';
        $settings = array();
        $table1=array();
        $uni_array = array();
        $maj_array = array();

        //Getting number of notifications
        require 'Notification/(Model)countNotifications.inc.php';
        if(mysqli_num_rows($k10)>0){
            $json_array[0]='success';
            while($res10 = mysqli_fetch_assoc($k10)){
                $notifandprof=$res10["notif_nbr"];
               
                array_push($table1,"$notifandprof");
               
           }
        
            
        }

        $json_array[1] = $table1;

        require '(Model)getAccountInfos.inc.php';
        if(mysqli_num_rows($xx6)>0){
           $res = mysqli_fetch_assoc($xx6);	
            array_push($settings,$res["first_name"],$res["last_name"],$res["email"],$res["username"],$res["bio"],$res["date_of_birth"],$res["uni_name"],$res["major"],$res["minor"]);
            
            require '(Model)getUniversitiesList.inc.php';
            if(mysqli_num_rows($xx)>0){
                $t1 = 1;
                while($res1 = mysqli_fetch_assoc($xx)){	
        
                    $uni_array[] = $res1["name_uni"]." - ".$res1["country_code"];
                }	
            }else $uni_array[] = [];

            require '(Model)getMajorsList.inc.php';
            if(mysqli_num_rows($xx1)>0){
                $t2 = 1;
                while($res1 = mysqli_fetch_assoc($xx1)){	
                    
                    $maj_array[] = array($res1["name_maj"]);
                }	
            }else $maj_array[] = [];


            $json_array[0]="success";
            $json_array[2]=$settings;
            $json_array[3]=$uni_array;
            $json_array[4]=$maj_array;
        }    

            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>