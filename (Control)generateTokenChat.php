<?php namespace GetStream\StreamChat;

//Generating userToken on login for Chat using the username of account

use GetStream\StreamChat\Client;
use GetStream\StreamChat\StreamException;

require '(Control)versionTest.php';
if(require '(Control)tokenCheck.php'){


    if(!empty($data->account_Id)){
        
        $account_Id = htmlspecialchars($data->account_Id);

        $json_array[0] = 'error4';
        

        require './vendor/autoload.php';
        require '(Model)getUsername.inc.php';
        if(mysqli_num_rows($xx)>0){
            $res = mysqli_fetch_assoc($xx);
            $usernameForChat=$res['username'];

            $server_client = new Client("z5j34vkctqrq", "zad2a8rmxswdce7ay4wv4xjsbwue4tzpjmkb8vex2aqzjpc646n6ttsc7j727nkn"); //stable for an existing account on stream (eg:krowl)
            $userToken = $server_client->createToken("'.$usernameForChat.'");
                
            $json_array[0] = 'success';
            $json_array[1] = $userToken;
            //$json_array[2] = $usernameForChat;
        }
        echo json_encode($json_array);

        mysqli_close($con);


    }else require '(View)Error7.php';
}
?>