<?php
require '(Control)versionTest.php';
require_once('vendor/autoload.php');
use SwotPHP\Facades\Native\Swot;

$emailExp= "/\A[^@\s]+@[^@\s]+\z/";

if(!empty($data->email)){

     $email = htmlspecialchars($data->email);


     require '(Model)config.inc.php';
     $con=con($server);
     require '(Model)registMail.inc.php';
     if($res["nbr"]==0){
          if(preg_match("/\s/", $email)){
               require '(View)Error1.php'; //1 No Spaces Allowed.

          }else if(preg_match($emailExp, $email)==1) {
                    //if(Swot::isAcademic($email)){
                         require '(View)success.php'; //Success.
                   // }else require '(View)Error2_6.php'; //2_6 It's not a university email.
               }else require '(View)Error2_5.php'; //2_5 It's not an  email format.

}else require '(View)Error6.php'; //6 Email already exist.
  
mysqli_close($con);


}else require '(View)Error7.php'; //7 Connection error.

?>