<?php 
//SETTINGS

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){ 
    
if(!empty($data->account_Id) && !empty($data->fname) && !empty($data->lname) && !empty($data->email) && !empty($data->username) && !empty($data->bio) && !empty($data->date_of_birth) && !empty($data->uni) && !empty($data->major) && !empty($data->minor)){
  
    $account_Id = htmlspecialchars($data->account_Id);
    $fname = htmlspecialchars($data->fname);
    $lname = htmlspecialchars($data->lname);
    $email = htmlspecialchars($data->email);
    $username = htmlspecialchars($data->username);
    $bio = htmlspecialchars($data->bio);
    $date_of_birth = htmlspecialchars($data->date_of_birth);
    $uni = htmlspecialchars($data->uni);
    $major = htmlspecialchars($data->major);
    $minor = htmlspecialchars($data->minor);
    $json_array[0] = 'error4';

    require '(Model)updateSettings.inc.php'; 
    if($yy){
        $json_array[0] = 'success';
    }

        echo json_encode($json_array);

        mysqli_close($con);

}else require '(View)Error7.php';


}
?>