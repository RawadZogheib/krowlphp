<?php
$locVersionTest = '(Control)versionTest.php';
require $locVersionTest;

$locError7 = '(View)error7.php';

    if(!empty($data->code) && !empty($data->email)){
        $code = htmlspecialchars($data->code);
        $email = htmlspecialchars($data->email);

        $locConfig = '(Model)config.inc.php';
        $locGetAccId = '(Model)getAccountId.inc.php';
        $locCodeFailed = '(View)codeFailed.php';
        $locSuccess = '(View)success.php';
        

        require $locConfig;
        $con=con($server);

        
        require $locGetAccId;
        if(mysqli_num_rows($g1) > 0){
            $account_Id = $gg1['account_Id'];
            require  '(Model)getCodeForgPass.inc.php';
            //echo $cc1['vCode'];
            if(mysqli_num_rows($k1) > 0){
                $kk1 = mysqli_fetch_assoc($k1);
                if($code == $kk1['vCode']){
                        require $locSuccess;
                        //require '(Control)postmark.php';
                }else{
                    require $locCodeFailed;
                }
            }else{
                echo 'unknown error.';  //the Code does not match with the Email
            }
        }else{
            echo 'Email does not exist.';
        }

        
      mysqli_close($con);
        
    }else require $locError7;//7 Field cannot be empty.




 
?>