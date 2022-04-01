<?php
$locVersionTest = '(Control)versionTest.php';
require $locVersionTest;

$locError7 = '(View)error7.php';


if(!empty($data->email) && !empty($data->password)  && !empty($data->repassword)){
    $email = htmlspecialchars($data->email);
    $password = htmlspecialchars($data->password);
	$repassword = htmlspecialchars($data->repassword);

    $locConfig ='(Model)config.inc.php';
    $locEncryptSet = '(Control)encryptSet.php';
    $locUpdatePass = '(Model)updatePass.inc.php';
    $locGetAccId = '(Model)getAccountId.inc.php';
    $locSuccess = '(View)success.php';

    $passRegExp = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@#$%^&:,?_-]).{8,}$/";

    require $locConfig;
	$con = con($server);

    require $locGetAccId;
    if(mysqli_num_rows($g1) > 0){
        $account_Id = $gg1['account_Id'];
        if(strlen($password) <8){
            require $locError2_3;//2_3 Your password must contain at least 8 characters, 1 lowercase(a-z),1 uppercase(A-Z),1 numeric character(0-9) and 1 special character(* . ! @ # $ % ^ & : , ? _ -).
        }else if(!preg_match($passRegExp, $password)){
            require $locError2_3;//2_3 Your password must contain at least 8 characters, 1 lowercase(a-z),1 uppercase(A-Z),1 numeric character(0-9) and 1 special character(* . ! @ # $ % ^ & : , ? _ -).
        }else if($repassword != $password){
            require $locError3;//3 Please make sure your passwords match.
        }else{
            require $locEncryptSet;
            require $locUpdatePass;
            require $locSuccess;
        }

    }else{
        echo 'Email does not exist.';
    }



}else require $locError7;//7 Field cannot be empty.




?>