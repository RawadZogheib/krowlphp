<?php
require '(Control)versionTest.php';
require 'Functions.php';
$option = array('cost'=>11);

if(!empty($data->email) && !empty($data->password)){

	$email = htmlspecialchars($data->email);
	$password = htmlspecialchars($data->password);
	$repass = '$2a$11$j7w28Z9P.PUeKWv6hciYpeBkYIkzBzsp5Ky5iYNVG1ElwK2AkEs0.';

	require '(Model)config.inc.php';
	$con=con($server);
	//require '(Control)encryptiGet.php';
    //require '(Model)passwordGet.inc.php';
	require '(Model)login.inc.php';
	$account_Id = $res["account_Id"];
	if($res["nbr"]==1){ //check if email exist
		/////////Verify Password(login)/////////
		
			if(password_verify($password, $res["hashedPassword"])){ //verify inserted password with thye increpted password
				//if(password_needs_rehash($hash, PASSWORD_DEFAULT, $option)){ //check if there is a new option
					$newHash = password_hash($password, PASSWORD_BCRYPT, $option); //rehash password
					require '(Model)passwordUpdate.inc.php';
				//}else 
				//	require '(View)true.php';	
				//}

				if($yy){
					// set password success
						require '(Control)tokenCreate.php';
						if(password_verify($pass, $repass)){
							if($yy2){
								require '(Model)getUserInfo.inc.php';

								if(!empty($data->private)){
									$private = htmlspecialchars($data->private);
									$array1 = decodeBase64($private);
									$table_id=$array1[0];
									$friend_id=$res["account_Id"];
									
									require '(Model)addParticipants.inc.php';
								}
								if($res["isRegistered"] == 0){//1 => is registed
									require '(Control)vCode.php';
									require  '(Model)loginUpdateVCode.inc.php';
									if($qq){
										require '(View)true.php';
										//require '(Control)postmark.php';
									}
								}else if($res["isRegistered"] == 1){
									require '(View)true.php';
								}else require '(View)false.php';
								
							} 
							else{
								require '(View)ErrorToken.php';
							}//return $token & $tokenHashed
						
						}else require '(View)false.php';
				
				}else require '(View)Error4.php'; //4 Cannot connect to the dataBase.

			}else require '(View)false.php';
	}else require '(View)false.php';

	mysqli_close($con);

	//var_dump($res["nbr"]);		
}else require '(View)Error7.php';




// (Control)encryptGet.php
// <?php
// if(!empty($password)){
//     $option = array('cost'=>11);
//     //$password = $_GET["pass"];
//     //require '(Model)passwordGet.inc.php';
//     require '(Model)login.inc.php';
//     /////////Verify Password(login)/////////
//     if(password_verify($password, $res["hashedPassword"])){
//         $newHash = password_hash($password, PASSWORD_BCRYPT, $option);
//         require '(Model)passwordUpdate.inc.php';
//     if($yy){
//         // set password success
            
//         if($res["nbr"]==1){
            
//             require '(View)true.php';
        
//         }else require '(View)false.php';

//     }else require '(View)Error4.php'; //4 Cannot connect to the dataBase.
//     }

// }


?>
