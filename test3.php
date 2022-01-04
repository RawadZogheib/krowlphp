<?php
$option = array('cost'=>11);

$rb = random_bytes(16);
echo $rb."</br>";

$b2h = bin2hex(random_bytes(16));
echo $b2h."</br>";
$token = password_hash($b2h, PASSWORD_BCRYPT, $option);
echo $token."</br>";


if(password_verify($b2h, $token))
        echo "heyyy"; 
?>