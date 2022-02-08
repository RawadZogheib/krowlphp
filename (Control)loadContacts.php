<?php 

//CHAT
//loading the recent contacts in chat section (PS:the contacts and friends should be from the same uni but we will add this restriction in add friend section)
//PS:Contacts are the friends that the account has been talking with recently (recent=1)

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $contacts = array();
    $t1=0;
    
    if(!empty($data->account_Id)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        
        require '(Model)loadContacts.inc.php';
        if(mysqli_num_rows($xx)>0){
            $t1 = 1;
            while($res = mysqli_fetch_assoc($xx)){	
                $contacts[] = array($res["account_Id"],$res["nameFriend"],$res["friend_id"]);
            }	
        }else  if(mysqli_num_rows($xx) == 0){
            $t1 = 2;
            $contacts = array();
        } 
            $json_array[0] = 'error4';
            $json_array[1] = $contacts;

            if($t1 == 1){
                $json_array[0] = 'success';
            }else if($t1 == 2){
                $json_array[0] = 'empty';
            }
            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>