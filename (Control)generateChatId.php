<?php namespace GetStream\StreamChat;

use GetStream\StreamChat\Client;
use GetStream\StreamChat\StreamException;

//require '(Control)versionTest.php';
//require '(Control)tokenCheck.php';
require './vendor/autoload.php';
require '(Model)getUsername.inc.php';

$usernameForChat=$xx['username'];
$server_client = new Client("swtmb3ttxxsq", "cgak3n5gnczyva9e5hnzgsqwfg2xz5a7v9sy6xvu3eryebrs7xbysxhhfhb5tajg"); //stable
$chat_id = $server_client->createToken("'.$usernameForChat.'");
echo $chat_id;
require '(View)generateChatId.php';
?>