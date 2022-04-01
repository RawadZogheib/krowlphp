<?php 
require '(Control)versionTest.php';
require_once('vendor/autoload.php');
//use SwotPHP\Facades\Native\Swot;
//json_decode($data);

if(!empty($data->email) && !empty($data->first_name) && !empty($data->last_name) && 
        !empty($data->username)&& !empty($data->password) && !empty($data->repassword) && !empty($data->date_of_birth) && !empty($data->photo) &&
        !empty($data->terms_of_service) && !empty($data->crop_x) && !empty($data->crop_y) &&
        !empty($data->crop_width) && !empty($data->crop_height) && !empty($data->university_ids) && 
        !empty($data->major_degree_ids) && !empty($data->minor_degree_ids)){

              
            $email = htmlspecialchars($data->email);
            $first_name = htmlspecialchars($data->first_name);
            $last_name= htmlspecialchars($data->last_name);
            $username = htmlspecialchars($data->username);
            $password= htmlspecialchars($data->password);
            $repassword= htmlspecialchars($data->repassword);
            $date_of_birth = htmlspecialchars($data->date_of_birth);
            $photo = htmlspecialchars($data->photo);
            $terms_of_service = htmlspecialchars($data->terms_of_service);
            $crop_x = htmlspecialchars($data->crop_x);
            $crop_y = htmlspecialchars($data->crop_y);
            $crop_width = htmlspecialchars($data->crop_width);
            $crop_height = htmlspecialchars($data->crop_height);
            $university_ids = htmlspecialchars($data->university_ids);
            $major_degree_ids = htmlspecialchars($data->major_degree_ids);
            $minor_degree_ids = htmlspecialchars($data->minor_degree_ids);
            
        


                //Success.
                //1 No Spaces Allowed.
                //2_1 Your username must contain at least 8 characters.
                //2_2 Your username can only contain lowercase and uppercase characters and special characters( _ .).
                //2_3 Your password must contain at least 8 characters, 1 lowercase(a-z),1 uppercase(A-Z),1 numeric character(0-9) and 1 special character(* . ! @ ^ ? _ -).
                //2_5 It's not a university email.
		//3 Please make sure your passwords match.
		//4 Cannot connect to the dataBase.     //Error with registration.
                //5 UserName already exist.
		//6 Email already exist.
                //7 Field cannot be empty.
                //else Failed to connect... Connection Problem.
                //exception OOPs! Something went wrong. Try again in few seconds.

                $userNameRegExp = "/^[a-zA-Z0-9_\.]*$/";
                $passwordRegExp ="/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@^?_-]).{8,}$/";
                $emailExp= "/\A[^@\s]+@[^@\s]+\z/";


                $currentDate = date("d-m-Y");
                $age = date_diff(date_create($date_of_birth), date_create($currentDate));

                require '(Model)config.inc.php';
                $con=con($server);
                require '(Model)registMail.inc.php';
                if($res["nbr"]==0){
                        require '(Model)registUserName.inc.php';
                        if($res["nbr"]==0){
                                if(preg_match("/\s/", $email) || preg_match("/\s/", $username)){
                                        require '(View)Error1.php'; //1 No Spaces Allowed.
                                }else if(preg_match($emailExp, $email)!=1){
                                        require '(View)Error2_5.php'; //2_5 It's not an  email format.
                                // }else if(!Swot::isAcademic($email)){
                                //         require '(View)Error2_6.php'; //2_6 It's not a university email.
                                
                                }else if(strlen($username)<8){
                                        require '(View)Error2_1.php'; //2_1 Your username must contain at least 8 characters.
                                }else if(preg_match($userNameRegExp, $username) == 0){
                                        require '(View)Error2_2.php'; //2_2 Your username can only contain lowercase and uppercase characters and special characters( _ .).
                                }else if(preg_match($passwordRegExp, $password) == 0){
                                        require '(View)Error2_3.php'; //2_3 Your password must contain at least 8 characters, 1 lowercase(a-z),1 uppercase(A-Z),1 numeric character(0-9) and 1 special character(* . ! @ # $ % ^ & : , ? _ -).
                                }else if ($password != $repassword){
                                        require '(View)Error3.php'; //3 Please make sure your passwords match.
                                }else if($age->format("%y")<17){
                                        require '(View)Error2_4.php'; //2_4 Your age must be greater than 17.
                                }else{
                                        require '(Control)vCode.php';
                                        require '(Control)encryptSet.php';
                                        require '(Model)registInsert.inc.php';
                                
                                        if($yy){
                                                echo '["true"]';//require '(View)true.php'; //Success.
                                                //require '(Control)postmark.php';
                                                //require '(Control)slack.php';
                                        }else require '(View)Error4.php'; //4 Cannot connect to the dataBase.
                                }
                        }else require '(View)Error5.php'; //5 UserName already exist.
                }else require '(View)Error6.php'; //6 Email already exist.
          mysqli_close($con);
        }else require '(View)Error7.php'; //7 Field cannot be empty.
       

?>