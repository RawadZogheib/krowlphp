<?php 

//WebHook
$json = file_get_contents('php://input');
$data = json_decode($json);
// on invite i have a table called participant where i can save the users that are allowed to see the private table 
?>