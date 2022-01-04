<?php namespace GetStream\StreamChat;

use GetStream\StreamChat\Client;
use GetStream\StreamChat\StreamException;

//require '(Control)versionTest.php';
//require '(Control)tokenCheck.php';
require './vendor/autoload.php';
require '(Model)getUsername.inc.php';

$usernameForChat=$xx['username'];
$server_client = new Client("z5j34vkctqrq", "zad2a8rmxswdce7ay4wv4xjsbwue4tzpjmkb8vex2aqzjpc646n6ttsc7j727nkn"); //stable for account krowl
$chat_id = $server_client->createToken("'.$usernameForChat.'");
echo $chat_id;
require '(View)generateChatId.php';
?>