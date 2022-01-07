<?php
$option = array('cost'=>11);
if(!empty($_GET["account_Id"]) && !empty($_GET["token"])){


    $account_Id = htmlspecialchars($_GET["account_Id"]);
    $token = htmlspecialchars($_GET["token"]);

require '(Model)config.inc.php';
$con=con();

require '(Model)tokenGet.inc.php'; // $tokenHashed

if($res["nbr"]>=1){

    $tokenHashed = $res["tokenHashed"];

}else{ 
    require '(View)false.php';
    exit;
}

if(password_verify($token, $tokenHashed)){
    // if(password_needs_rehash($tokenHashed, PASSWORD_BCRYPT, $option)){ //check if there is a new option
    //     $tokenHashed = password_hash($token, PASSWORD_BCRYPT, $option);
    // }

    $token = bin2hex(random_bytes(16));
    echo $token . "</br></br>";
    $tokenHashed = password_hash($token, PASSWORD_BCRYPT, $option);

    
    require '(Model)tokenSet.inc.php'; //not done $token to the account 
                    
    if($yy){
        // set token success
        echo "</br>tokenSuccess</br>";

        require '(Model)tokenDelete.inc.php';
        if($yy1){
            // set tokenHashed deleted
            echo "</br>deleteSuccess</br>";
        
        }else {
            echo "ErrorDelete";
            exit;
        }

    }else {
        echo "ErrorTest";
        exit;
    }

}else {
    echo "ErrorTest2";
    exit;
}
    mysqli_close($con);
}else {
    echo "ErrorTest3";
    exit;
}
////// To check if token is valid
//  if(require '(Control)tokenCheck.php'){
//      //Success
//  }




// $option = array('cost'=>11);

// $rb = random_bytes(16);
// echo $rb."</br>";

// $b2h = bin2hex(random_bytes(16));
// echo $b2h."</br>";
// $token = password_hash($b2h, PASSWORD_BCRYPT, $option);
// echo $token."</br>";


// if(password_verify($b2h, $token))
//         echo "heyyy"; 
?>