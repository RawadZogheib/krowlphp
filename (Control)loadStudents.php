<?php 

//STUDENTS
//Loading Students in then same university as the user via Students

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $student_array = array();
    $table1=array();

   
    $tot_students=0; //number of students in a specific uni
    
    $json_array[0] = 'success';
    
    if(!empty($data->account_Id) && !empty($data->currentPage)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $currentPage=htmlspecialchars($data->currentPage);

        require '(Model)countStudents.inc.php';

        $tot_students=$res1["nbr"];
    

        require '(Model)loadStudents1.inc.php';
        if(mysqli_num_rows($xx)>0){

            $json_array[1] = $tot_students;
        
           

            while($res2 = mysqli_fetch_assoc($xx)){	

                $student_id=$res2["account_Id"];

                $table1 = array($student_id,
                                    $res2["first_name"],
                                    $res2["last_name"],
                                    $res2["photo"],
                                    $res2["uni_name"],
                                    );


                require '(Model)loadStudents2.inc.php';

                if($res3["nbr"]==1){
                    array_push($table1,'true'); // true -> this student is a friend with the account_Id
            
                }else{
                    array_push($table1,'false'); // false -> this student is not a friend with the account_Id
                }
                array_push($student_array,$table1);
                $table1=array();


            }
            $json_array[2] = $student_array;

        }else  if(mysqli_num_rows($xx) == 0){

            $student_array=array();

            $json_array[0] = 'empty';
            $json_array[1] = 0;
    
            
        }
                    
         
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>