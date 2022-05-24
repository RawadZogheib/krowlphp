<?php 

//STUDENTS
//Loading Students in then same university as the user via Students

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $tot_notifs=0;
    $students = array();
    $table1=array();
    $nbr_friends =0;
    $t1=0;
   
    $tot_students=0; //number of students in all uni
    
    $json_array[0] = 'error4';
    
    if(!empty($data->account_Id) && !empty($data->currentPage)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $currentPage=htmlspecialchars($data->currentPage);

        //Getting number of notifications
        require 'Notification/(Model)countNotifications.inc.php';
        if(mysqli_num_rows($k10)>0){
            $res10 =mysqli_fetch_assoc($k10);
            $tot_notifs=$res10["notif_nbr"];
        }
 
         $json_array[1] = $tot_notifs;



        require '(Model)countStudents.inc.php';

        $tot_students=$res1["nbr"];
    

        require '(Model)loadStudents1.inc.php';
        if(mysqli_num_rows($xx)>0){
            
            $json_array[2] = "$tot_students";
        
           

            while($res2 = mysqli_fetch_assoc($xx)){	

                $student_id=$res2["account_Id"];

                $table1 = array($student_id,
                                    $res2["first_name"],
                                    $res2["last_name"],
                                    "",
                                    // $res2["photo"],
                                     $res2["uni_name"],
                                     $res2["bio"],

                                    );
                require "(Model)loadFriends2.inc.php";
                if(mysqli_num_rows($xx5)>=0)
                $nbr_friends=mysqli_num_rows($xx5);
                
                array_push($table1,"$nbr_friends");
                require '(Model)loadStudents2.inc.php';

                if($res3["nbr"]==1){
                    $t1 = 1;
                    if($res3["request"]==1)// 1 -> REQUEST OR 2 -> FRIEND IN DB 
                    array_push($table1,'1');  //1 -> REQUEST
                    else if($res3["request"]==2)
                    array_push($table1,'2');// 2 -> FRIEND 
                }else{
                    $t1 = 1;
                    array_push($table1,'0'); // 0 -> this student is not a friend with the account_Id , UNFRIEND
                }
                array_push($students,$table1);
                $table1=array();

            }
            $json_array[3] = $students;

        }else  if(mysqli_num_rows($xx) == 0){
            $t1 = 2;
            $students=array();
            
        }
            
        if($t1 == 1){
            $json_array[0] = 'success';
        }else if($t1 == 2){
            $json_array[0] = 'empty';
            $json_array[2] = 0;
        }
         
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>