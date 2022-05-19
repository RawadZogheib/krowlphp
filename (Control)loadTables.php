<?php 

//Loading Tables and the Occupants of every table of accounts in a same University 

//require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $table1=array();
    $table2=array();
    $table3=array();
    $table4=array();
    $table5=array();
    $table6=array();
    $json_array=array();

    $j=2; //counter
    $tot_tables=0;
    $tot_notifs=0;
    $t1=0;
    
   
    if(!empty($data->account_Id)&& !empty($data->isPrivet) && !empty($data->currentPage) && !empty($data->user_uni)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $isPrivate = htmlspecialchars($data->isPrivet); //1 -> Public & 2 ->Private
        $user_uni = htmlspecialchars($data->user_uni);
        $currentPage=htmlspecialchars($data->currentPage);

        //Getting number of notifications
        require 'Notification/(Model)loadNotifications.inc.php';
        if(mysqli_num_rows($k1)>0){
            $tot_notifs=mysqli_num_rows($k1);
        }
        
        $json_array[0] = "error4";
        $json_array[1] = "$tot_notifs";
  



        if($isPrivate == '1'){
            require '(Model)countPublicTables.inc.php';
            $tot_tables=$res["nbr"];
            require '(Model)loadPublicTables.inc.php';
        }else{
            require '(Model)countPrivateTables.inc.php';
            $tot_tables=$res["nbr"];
            require '(Model)loadPrivateTables.inc.php';
        }
       
        //Sending the tables with their participant(if private) and occupants
        if(mysqli_num_rows($xx)>0){

            $json_array[$j] = $tot_tables;

            while($res = mysqli_fetch_assoc($xx)){	
                $new=false;
                $isUserOccupant=false;
                $table1=array();
                $table_id=$res["table_id"];
                $table_name=$res["table_name"];
                $seats=$res["seats"];
                $isSilent=$res["isSilent"];
                $admin_id=$res["admin_id"];
                $d11=$res["created_at"];
                $d22=date("Y-m-d H:i:s");

                $d1 = strtotime($d11);
                $d2 = strtotime($d22);
                $totalSecondsDiff = abs($d2-$d1); 
                $totalMinutesDiff = $totalSecondsDiff/60;
                if($totalMinutesDiff<=5){
                    $new=true;
                }

                if($isSilent == '2'){
                    $isSilent=true;
                }else{ $isSilent=false;}
                $admin ="";
                $isAdmin=false;
                        if($res["admin_id"] == $account_Id){
                            $isAdmin=true;
                            if($isPrivate == '2'){
                            $admin=base64_encode($table_id.'-'.$res["table_pass"]);
                        }
                    }
                $table1 = array($table_id,$admin,$table_name,$seats,$isSilent,$new,$isUserOccupant,$isAdmin);
                
            
                
                if($isPrivate == '2'){
                    require '(Model)loadParticipants.inc.php';
                    if(mysqli_num_rows($yy1)>0){
                        while($res5 = mysqli_fetch_assoc($yy1)){
                            $table5=array();
                            $table5=array($res5["account_Id"],$res5["username"],"photo");
                            array_push($table6,$table5);
                             
                        }
                    }else if(mysqli_num_rows($yy1) == 0){
                        $table6=array();
                        
                    }
                array_push($table1,$table6);
                $table6=array();
                }
               


                require '(Model)loadOccupants.inc.php';
                if(mysqli_num_rows($yy)>0){
                    $t1=1;

                    while($res1 = mysqli_fetch_assoc($yy)){	
                        $table2 = array($res1["account_Id"],$res1["username"],$res1["position"],"batikhh");
                        if($res1["account_Id"] == $account_Id){
                            $table1[6]=true;
                        }
                        array_push($table3,$table2);
                        $table2=array();
                    }	
                    array_push($table1,$table3);
                    $table3=array();
               
                }else  if(mysqli_num_rows($yy) == 0){
                    $t1=1;
                    $table3=array();
                    array_push($table1,$table3);
                }

                array_push($table4,$table1);
                

                ///it's for distributing every 12 tables on a body

                // if ($i == $nbr_table){
                //     $json_array[$j] = $table4;
                // }                
                // if ($i == 12){
                //     $json_array[$j] = $table4;
                //     $i=0;
                //     $j=$j+1;
                //     $nbr_table=$nbr_table-12;
                //     $table4=array();
                // }
                
               
            }	
        }else  if(mysqli_num_rows($xx) == 0){
            $t1 = 2;
            $table4=array();

        }


        if($t1 == 1){
            $json_array[0] = 'success';
        }else if($t1 == 2){
            $json_array[0] = 'empty';
            $json_array[$j] = "0";
        }

        $json_array[$j+1] =  $table4;



            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';

}
?>