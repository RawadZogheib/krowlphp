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

                    if($key == "email"){

                        $emailExp= "/\A[^@\s]+@[^@\s]+\z/";
                        $email=$val;
                        require '(Model)registMail.inc.php';

                        if($res["nbr"]==0){

                            if(preg_match("/\s/", $email)){

                                require '(View)Error1.php'; //1 No Spaces Allowed.
                   
                            }else if(preg_match($emailExp, $email)==1){

                                       //if(Swot::isAcademic($email)){
                                        require '(Model)updateSettings.inc.php';
                                        if($yy){
                                            $json_array[0] = 'success';
                                        }

                                      // }else require '(View)Error2_6.php'; //2_6 It's not a university email.
                                    }else require '(View)Error2_5.php'; //2_5 It's not an  email format.
                   
                        }else require '(View)Error6.php'; //6 Email already exist.

                    }else if($key == "username"){

                        $userNameRegExp = "/^[a-zA-Z0-9_\.]*$/";
                        $username=$val;
                        require '(Model)registUserName.inc.php';

                        if($res["nbr"]==0){

                             if(preg_match("/\s/", $username)){
                                  require '(View)Error1.php'; //1 No Spaces Allowed.
                               }else if(strlen($username)<8){
                                   require '(View)Error2_1.php'; //2_1 Your username must contain at least 8 characters.
                               }else if(preg_match($userNameRegExp, $username) == 0){
                                   require '(View)Error2_2.php'; //2_2 Your username can only contain lowercase and uppercase characters and special characters( _ .).
                               }else{
                                require '(Model)updateSettings.inc.php';
                                if($yy){
                                        require '(Control)generateTokenChat.php';
                                        $key="token_chat";
                                        $val=$userTokenChat;
                                        require '(Model)updateSettings.inc.php';
                                        if($yy){
            
                                            $json_array[0] = 'success';
            
                                        }
                               }}
                   
                        }else require '(View)Error5.php'; //5 UserName already exist.




                    }else if($key == "date_of_birth"){
                        $date_of_birth=$val;
                        $currentDate = date("d-m-Y");
                        $age = date_diff(date_create($date_of_birth), date_create($currentDate));

                        if($age->format("%y")<17){
                            require '(View)Error2_4.php';  //2_4 Your age must be greater than 17.
                        }else require '(Model)updateSettings.inc.php';
                        if($yy){
                            $json_array[0] = 'success';
                        }
                        

                    }else{
                        require '(Model)updateSettings.inc.php';
                        if($yy){
                            $json_array[0] = 'success';
                        }
                    }
                }else{

                   array_push($json_array,$index);

                }

            }

        }
        
        echo json_encode($json_array);
        mysqli_close($con);



    }else require '(View)Error7.php';

}
?>