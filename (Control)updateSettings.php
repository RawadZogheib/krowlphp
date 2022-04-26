<?php 
//SETTINGS

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
    //converting json_array to an array 
    $json = file_get_contents('php://input');
    $data = json_decode($json,true);

    if(!empty($data["account_Id"])){
        
        //saving the value before removing it from the array
        $account_Id= htmlspecialchars($data["account_Id"]);
        $json_array[0] = 'error4';

        //removing these 2 values
        unset($data["version"]);
        unset($data["account_Id"]);

        //checking if after removing version and account_Id there's any value to update it in DB 
        if(!empty($data)){

            foreach ($data as $index => $value){
                
                if(!empty($data[$index])){

                    $key=htmlspecialchars($index);
                    $val=htmlspecialchars($value);
                    require '(Model)updateSettings.inc.php';
                    if($yy){
                        if($key == "username"){

                            $username=$val;
                            require '(Control)generateTokenChat.php';
                            $key="token_chat";
                            $val=$userTokenChat;
                            require '(Model)updateSettings.inc.php';
                            if($yy){

                                $json_array[0] = 'success';

                            }
                            
                        }else{

                            $json_array[0] = 'success';

                        }
                        

                    }

                }else{

                   array_push($json_array,$index);

                }

            }

        }
        
        echo json_encode($json_array);



    }else require '(View)Error7.php';

}
?>