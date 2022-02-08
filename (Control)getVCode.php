<?php 

//Getting the code for an existing email via Code

//json_decode($data);
require '(Control)versionTest.php';

if(!empty($data->email) && !empty($data->username) && !empty($data->vCode)){

              
    $email = htmlspecialchars($data->email);
    $username = htmlspecialchars($data->username);
    $vCode = htmlspecialchars($data->vCode);
            
            
        require '(Model)config.inc.php';
        $con=con($server);
        require '(Model)getVCodeMySQL.php';
        
        if($vCode == $res["vCode"]){
            require '(Control)generateTokenChat.php';
            require '(View)success2.php'; //to be addedd

        }else require '(View)false.php';

    mysqli_close($con);

}else require '(View)Error7.php';
    

?>