<?php namespace GetStream\StreamChat;

//Generating userToken on login for Chat using the username of account

use GetStream\StreamChat\Client;
use GetStream\StreamChat\StreamException;


require './vendor/autoload.php';

$usernameForChat=$res['username'];

$server_client = new Client("z5j34vkctqrq", "zad2a8rmxswdce7ay4wv4xjsbwue4tzpjmkb8vex2aqzjpc646n6ttsc7j727nkn"); //stable for an existing account on stream (eg:krowl)
$userTokenChat = $server_client->createToken($usernameForChat);
    



?>