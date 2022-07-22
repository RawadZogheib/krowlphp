<?php
    $version = $_POST['version'];
    $account_Id =$_POST['account_Id'];
    $profilePath=$_POST['profilePath'];
    
     echo "AAAAAAA";
     echo $account_Id;
    //$arrVersion=$array = explode(' ', $version); //convert a string to an array
    //$jsonVersion=json_encode($arrVersion); //convert an array to a json list
    
    // $locVersionTest = $_SERVER["DOCUMENT_ROOT"]  . '/moonLighters_php/Config/Control/(Control)versionTest.php';
    // require $locVersionTest;
    //Test version
    require '../Global/globalVariables.php';

    if($version != $apiVersion){
        require '../(View)ErrorVersion.php';
        exit;
    }

    require '../(Model)config.inc.php';
    $con=con($server);

//array to return
$return["error"] = false;
$return["msg"] = "";
$return["success"] = true;

if(isset($_FILES["file"])){
    $target_dir = "Assets";//directory to upload file
    if(!file_exists("../$target_dir")){
        mkdir("../$target_dir");
    }
    
    $filename = $_FILES["file"]["name"];
	
    //name of file
    //$_FILES["file"]["size"] get the size of file
    //you can validate here extension and size to upload file.

    $savefile = "C:/inetpub/wwwroot/Pascal/krowl/krowlphpTest/$target_dir/$filename";
    
    //complete path to save file

    if(move_uploaded_file($_FILES["file"]["tmp_name"], $savefile)) {
        $return["error"] = false;
        require '(Model)uploadMyProfilePicture.inc.php';
        //upload successful
    }else{
        $return["error"] = true;
        $return["msg"] =  "Error during saving file.";
    }
}else{
    $return["error"] = true;
    $return["msg"] =  "No file is sublitted.";
}

header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string







?>