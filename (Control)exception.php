
<?php
$json = file_get_contents('php://input');
$data = json_decode($json);


if(!empty($data->exception)){
    require '(Model)config.inc.php';
    $con=con($server);

    $exception=mysqli_real_escape_string($con,$data->exception);
    require '(Model)exception.php';
}

?>