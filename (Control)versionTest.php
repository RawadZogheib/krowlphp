<?php
$json = file_get_contents('php://input');
$data = json_decode($json);
// Token configuration
$server="krowl";// DB name
$time = 1;// Token expire time
$tokenLimitation = 5;// Token per account

if(!empty($data->version)){

    $version = htmlspecialchars($data->version);


    $apiVersion = "v1.0";

    if($version != $apiVersion){
        require '(View)ErrorVersion.php';
        exit;
    }


}else require '(View)Error7.php'; //7 Connection error.
?>