<?php 
// require_once('.\vendor\autoload.php');
// use Postmark\PostmarkClient;

// // Example request
// $client = new PostmarkClient("dd966b63-c58c-4772-8123-05e4e98acd1a");

// $sendResult = $client->sendEmail(
//   "team@krowl.io",
//    $email,
//   "Hello ".$username ." from Postmark!",
//   "This is just a friendly 'hello' from your friends at Postmark.This is your code:  ".$vCode."."
// );

require_once('.\vendor\autoload.php');
use Postmark\PostmarkClient;


$client = new PostmarkClient("dd966b63-c58c-4772-8123-05e4e98acd1a");
print_r($client);
$fromEmail = "team@krowl.io";
$toEmail = "D.AlMourany.1@st.ul.edu.lb";
$subject = "Hello from Postmark";
$htmlBody = "<strong>Hello</strong> dear Postmark user.";
$textBody = "Hello dear Postmark user.";
$tag = "example-email-tag";
$trackOpens = true;
$trackLinks = "None";


echo "hiii";
// Send an email:
$sendResult = $client->sendEmail(
  $fromEmail,
  $toEmail,
  $subject,
  $htmlBody,
  $textBody,
  $tag,
  $trackOpens,
  NULL, // Reply To
  NULL, // CC
  NULL, // BCC
  NULL, // Header array
  NULL, // Attachment array
  $trackLinks,
  NULL, // Metadata array

);
echo "Result: ".$sendResult;
?>
