<?php namespace GetStream\StreamChat;

//Generating userToken on login for Chat using the username of account

use GetStream\StreamChat\Client;
use GetStream\StreamChat\StreamException;


require './vendor/autoload.php';



$server_client = new Client("yzh74xz7aez6", "9jdgxqtz4fa59g6a4fyd4w58cmwwpke5dfjqtv77tq74u6g484qqxkn26jj49cna"); //stable for an existing account on stream (eg:krowl)
$userTokenChat = $server_client->createToken($username);
    



?>