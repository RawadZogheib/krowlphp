<?php
$locVersionTest = '(Control)versionTest.php';
require $locVersionTest;

$locError7 = '(View)error7.php';


    if(!empty($data->email)){
        $email = htmlspecialchars($data->email);
        
        $locConfig = '(Model)config.inc.php';
        $locSuccess = '(View)success.php';
        $locError11 = '(View)error11.php';
        $locError12 = '(View)error12.php';
        
        require $locConfig;
        $con=con($server);
        
        require '(Model)getEmail.inc.php';
        if($em1['nbr'] > 0 ){
            require '(Model)getIsRegistered.inc.php';
            if($reg1['isRegistered'] == 1){
                //require '(Control)postmark.php';
                require $locSuccess;
            }else{
                require $locError11;
            }
        }else{
            require $locError12;
        }

        mysqli_close($con);


    }else require $locError7;


?>