<?php 

//Creating a Post via Forum2

require '(Control)versionTest.php'; 
require 'Functions.php';
require '(Model)config.inc.php';
$con=con($server);
if(!empty($data->private)){
    $private = htmlspecialchars($data->private);
    $json_array[0] = 'error4';

    $array1 = decodeBase64($private);

        if($array1[0] != 0){

            require '(Model)checkLinkTable.inc.php'; 
            if($res["nbr"] == 1){
                $json_array[0] = 'success';
            }

        }

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';



?>