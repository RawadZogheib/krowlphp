<?php namespace GetStream\StreamChat;

use GetStream\StreamChat\Client;
use GetStream\StreamChat\StreamException;

require '(Control)versionTest.php';
if(require '(Control)tokenCheck.php'){

    require '(Model)config.inc.php';
    $con=con();
    if(!empty($data->user_id)){
        
        $user_id = htmlspecialchars($data->user_id);

        $json_array[0] = 'error4';
        

        require './vendor/autoload.php';
        require '(Model)getUsername.inc.php';
        if(mysqli_num_rows($xx)>0){

            $usernameForChat=$res['username'];

            $server_client = new Client("z5j34vkctqrq", "zad2a8rmxswdce7ay4wv4xjsbwue4tzpjmkb8vex2aqzjpc646n6ttsc7j727nkn"); //stable for account krowl
            $userToken = $server_client->createToken("'.$usernameForChat.'");
                
            $json_array[0] = 'success';
            $json_array[1] = $token;
            $json_array[2] = $userToken;
            $json_array[3] = $usernameForChat;
        }


    }else require '(View)Error7.php';
}
?>