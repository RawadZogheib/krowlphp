<?php namespace GetStream\StreamChat;

//Generating userToken on login for Chat using the username of account

use GetStream\StreamChat\Client;
use GetStream\StreamChat\StreamException;


require './vendor/autoload.php';



$server_client = new Client($streamKey, $streamSecret); //stable for an existing account on stream (eg:krowl)
$userTokenChat = $server_client->createToken($username);
    



?>