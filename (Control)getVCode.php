<?php 
//json_decode($data);
require '(Control)versionTest.php';

if(!empty($data->email) && !empty($data->vCode)){

              
    $email = htmlspecialchars($data->email);
    $vCode = htmlspecialchars($data->vCode);
            
            
        require '(Model)config.inc.php';
        $con=con();
        require '(Model)getVCodeMySQL.php';
        
        if($vCode == $res["vCode"]){
            require '(View)success.php';
        }else require '(View)false.php';

        mysqli_close($con);
    }
    

?>