<?php 

//Loading Tables and the Occupants of every table of accounts in a same University 

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $table1=array();
    $table2=array();
    $table3=array();
    $table4=array();
    
    $t1=0; // $t1=1 -> success   $t1=2 -> failure
    $t2=0; // $t2=1 -> success   $t2=2 -> failure

    $i=0; //counter
    $j=1; //counter

    if(!empty($data->account_Id) && !empty($data->user_uni)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $user_uni = htmlspecialchars($data->user_uni);
      

        require '(Model)loadTables.inc.php';


        if(mysqli_num_rows($xx)>0){
            $nbr_table= mysqli_num_rows($xx); 
            echo $nbr_table;
            echo "</br>";
            $t1 = 1;

            while($res = mysqli_fetch_assoc($xx)){	
                $i=$i+1;
                $table1=array();

                $table_name=$res["table_name"];
                $seats=$res["seats"];
                $table_type=$res["table_type"];

                $table1 = array($table_name,$seats,$table_type);

                require '(Model)loadOccupants.inc.php';
                if(mysqli_num_rows($yy)>0){
                    $t2 = 1;

                    while($res1 = mysqli_fetch_assoc($yy)){	
                        $table2 = array($res1["account_Id"],$res1["username"],$res1["position"],"batikhh");
                        array_push($table3,$table2);
                        $table2=array();
                    }	

                    array_push($table1,$table3);
                    $table3=array();
               
                }else  if(mysqli_num_rows($yy) == 0){
                    $t2 = 2;

                }
                array_push($table4,$table1);
                if ($i == $nbr_table){
                    $json_array[$j] = $table4;
                }
                if ($i == 12){
                    $i=0;
                    $j=$j+1;
                }
                
               
            }	
        }else  if(mysqli_num_rows($xx) == 0){
            $t1 = 2;
            $table4 []=[];
        }
                    
            $json_array[0] = 'error4';
            //$json_array[1] = $table4;

            if($t1 == 1 && $t2 == 1){
                $json_array[0] = 'success';

            }else if($t1 == 2){
                $json_array[0] = 'empty';

            }


            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';

}
?>