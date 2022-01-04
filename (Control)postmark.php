<?php 
require_once('.\vendor\autoload.php');
use Postmark\PostmarkClient;

// Example request
$client = new PostmarkClient("dd966b63-c58c-4772-8123-05e4e98acd1a");

$sendResult = $client->sendEmail(
  "team@krowl.io",
   $email,
  "Hello ".$username ." from Postmark!",
  "This is just a friendly 'hello' from your friends at Postmark.This is your code:  ".$vCode."."
);


?>