<?php 


require '../(Control)versionTest.php'; 
if(require '../(Control)tokenCheck.php'){

    $notifs = array();
    $t1=0;
    
    if(!empty($data->account_Id)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $json_array[0] = 'error4';
        
        require '(Model)loadNotifications.inc.php';
        if(mysqli_num_rows($k1)>0){
            $t1 = 1;
            while($res11 = mysqli_fetch_assoc($k1)){
                $p=$res11['notif_params'];
                $params = json_decode($p,true); //array
                $notifs[]=array($res11["notif_id"],$res11["notif_sender"],$res11["username"],$res11["notif_type"],$params);
        
            }
        }else  if(mysqli_num_rows($k1) == 0){
            $t1 = 2;
            $notifs = array();
        }       
            
            $json_array[1] = $notifs;
           

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