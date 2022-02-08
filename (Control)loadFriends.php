<?php 

//CHAT
//loading the friends that has recent=0 or recent=1 in friend section (PS:the contacts and friends should be from the same uni but we will add this restriction in add friend section)

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){

    $friends = array();
    $t1=0;
    
    if(!empty($data->account_Id)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        
        require '(Model)loadFriends.inc.php';
        if(mysqli_num_rows($xx)>0){
            $t1 = 1;
            while($res = mysqli_fetch_assoc($xx)){	
                array_push($friends,$res["account_Id"],$res["nameFriend"],$res["friend_id"]);
            }	
        }else  if(mysqli_num_rows($xx) == 0){
            $t1 = 2;
            $friends = array();
        }       
            $json_array[0] = 'error4';
            $json_array[1] = $friends;
           

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