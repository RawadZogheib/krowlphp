<?php 


require '../(Control)versionTest.php'; 
if(require '../(Control)tokenCheck.php'){

    $notifs = array();
    $t1=0;
    
    if(!empty($data->account_Id) && !empty($data->currentPage)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $currentPage = htmlspecialchars($data->currentPage);
        if(gettype($data->notif_nbr) === "integer"){
            $notif_nbr = htmlspecialchars($data->notif_nbr); //sending the badge that we clicked on 
            $count = 5; //i want to display the 5 latest notifications
            $notif_status="notif_status=0 OR notif_status=1 OR notif_status=2";
        }else{
            $count=20;
            $notif_status="notif_status=0 OR notif_status=1 OR notif_status=2 OR notif_status=3 OR notif_status=4";
        }
        $json_array[0] = 'error4';
        
     

        
        require '(Model)loadNotifications.inc.php';
        if(mysqli_num_rows($k1)>0){
            $t1 = 1;
            while($res11 = mysqli_fetch_assoc($k1)){
                $p=$res11['notif_params'];
                $params = json_decode($p,true); //array
                $notifs[]=array($res11["notif_id"],$res11["notif_sender"],$res11["username"],$res11["notif_type"],$res11["notif_status"],$params);
        
            }
        }else  if(mysqli_num_rows($k1) == 0){
            $t1 = 2;
            $notifs = array();
        }       
            
            $json_array[1] = $notifs;

            require 'Profile/(Model)getProfilePicture.inc.php';
            if(mysqli_num_rows($g1)>0){
                $res12 =mysqli_fetch_assoc($g1);
                $profilePath=$res12["photo"];
            }
    
            $json_array[2] = "$profilePath";
           
            $status_before = 0;
            $status_after = 1;
            if($t1 == 1){
                $json_array[0] = 'success';
                if(gettype($data->notif_nbr) === "integer"){
                    require '(Control)clickRing.php';
                }
                
            }else if($t1 == 2){
                $json_array[0] = 'empty';
                if(gettype($data->notif_nbr) === "integer"){
                    require '(Control)clickRing.php';
                }
            }
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '../(View)Error7.php';
}
?>