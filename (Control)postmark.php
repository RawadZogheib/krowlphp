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

// require_once('.\vendor\autoload.php');
// use Postmark\PostmarkClient;


// $client = new PostmarkClient("dd966b63-c58c-4772-8123-05e4e98acd1a");
// print_r($client);

// $fromEmail = "D.AlMourany.1@st.ul.edu.lb";
// $toEmail = "team@krowl.io";
// $subject = "Hello from Postmark";
// $htmlBody = "<strong>Hello</strong> dear Postmark user.";
// $textBody = "Hello dear Postmark user.";
// $tag = "example-email-tag";
// $trackOpens = true;
// $trackLinks = "None";


// echo "h30000";
// // Send an email:
//  print_r($client->sendEmail(
//   $fromEmail,
//   $toEmail,
//   $subject,
//   $htmlBody,
//   $textBody,
//   $tag,
//   $trackOpens,
//   NULL, // Reply To
//   NULL, // CC
//   NULL, // BCC
//   NULL, // Header array
//   NULL, // Attachment array
//   $trackLinks,
//   NULL, // Metadata array

// ));



      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      require '/krowlphp/Composer/vendor/phpmailer/phpmailer/src/Exception.php';
      require '/krowlphp/Composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
      require  '/krowlphp/Composer/vendor/autoload.php';

      // $locCodeException =  $_SERVER["DOCUMENT_ROOT"]  . '/krowlphp/Error/View/(View)codeException.php';
      
      $emailRegExp = "/[a-zA-Z0-9]+@(g|hot)mail.com/";
      $email = 'dana.almourany@gmail.com';

// if(!preg_match($emailRegExp,$email)){
//       require $locError2_5;//2_5 It's not an  email format.
// }else{
      
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Mailer = "smtp";

      $mail->SMTPDebug  = 0;  
      $mail->SMTPAuth   = TRUE;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;
      $mail->Host       = "smtp.gmail.com";
      $mail->Username   = "krowldf@gmail.com";
      $mail->Password   = "dataFlow@123";

      $mail->IsHTML(true);
      $mail->AddAddress($email);
      $mail->SetFrom($mail->Username);
      //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
      //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
      $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
      $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class code: </b>";
      
      print_r($mail->MsgHTML($content)); 
      if(!$mail->Send()) {
        echo "Error while sending Email.";
        //var_dump($mail);
      } else {
        //echo "Email sent successfully";
      }

?>


