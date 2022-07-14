<?php 

//POST
//Loading Posts of accounts in then same university via Forum1

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $tot_notifs=0;
    $posts = array();
    $table1= array();
    $t1=0;
    
    
    if(!empty($data->account_Id) && !empty($data->user_uni) && !empty($data->currentPage)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $user_uni = htmlspecialchars($data->user_uni);
        $currentPage = htmlspecialchars($data->currentPage);
        $count=5;
        $json_array[0] = 'error4';

        //Getting number of notifications
        require 'Notification/(Model)countNotifications.inc.php';
        if(mysqli_num_rows($k10)>0){
            $res10 =mysqli_fetch_assoc($k10);
            $tot_notifs=$res10["notif_nbr"];
        }

        $json_array[1] = "$tot_notifs";
                
        
        require '(Model)loadPosts.inc.php';
        if(mysqli_num_rows($xx)>0){
           
     
            while($res = mysqli_fetch_assoc($xx)){	
                $post_id=$res["post_id"];
                array_push($table1,$post_id,
                                    $res["username"],
                                    $res["post_tag"],
                                    $res["post_question"],
                                    $res["post_likes"],
                                    $res["post_date"],
                                    $res["post_context"],
                                    );
            require "(Model)checklikePosts.inc.php"; //status of the button that has been pressed ( -1->unlike, 0->no button is pressed, 1->like )
            if($res2["nbr"]==0){
                $t1 = 1;
                array_push($table1,"0");
            }else{
                $t1 = 1;
                array_push($table1,$res2["post_likes_val"]);
            }
            array_push($posts,$table1);
            $table1=array();
            }	
        }else if(mysqli_num_rows($xx) == 0){
            $t1 = 2;
            $posts = array();
        }
                    
             
            $json_array[2] =  $posts;
            

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