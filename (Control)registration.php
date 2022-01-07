<?php

require '(Control)versionTest.php';
$userNameRegExp = "/^[a-zA-Z0-9_\.]*$/";

if(!empty($data->username)&& !empty($data->date_of_birth)){

    $username = htmlspecialchars($data->username);
    $date_of_birth = htmlspecialchars($data->date_of_birth);

    $currentDate = date("d-m-Y");
    $age = date_diff(date_create($date_of_birth), date_create($currentDate));
    

     require '(Model)config.inc.php';
     $con=con();
     require '(Model)registUserName.inc.php';
     if($res["nbr"]==0){
          if(preg_match("/\s/", $username)){
               require '(View)Error1.php'; //1 No Spaces Allowed.
            }else if(strlen($username)<8){
                require '(View)Error2_1.php'; //2_1 Your username must contain at least 8 characters.
            }else if(preg_match($userNameRegExp, $username) == 0){
                require '(View)Error2_2.php'; //2_2 Your username can only contain lowercase and uppercase characters and special characters( _ .).
            }else if($age->format("%y")<17){
                require '(View)Error2_4.php';  //2_4 Your age must be greater than 17.
            }else require '(View)success.php'; //Success.

     }else require '(View)Error5.php'; //5 UserName already exist.
  mysqli_close($con);
}else require '(View)Error7.php'; //7 Connection error.

?>