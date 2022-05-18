<?php
$json = file_get_contents('php://input');
$data = json_decode($json);

if(!empty($data->version)){

    $version = htmlspecialchars($data->version);
    
    require 'Global/globalVariables.php';

    if($version != $apiVersion){
        require '(View)ErrorVersion.php';
        exit;
    }


}else require '(View)Error7.php'; //7 Connection error.
?>