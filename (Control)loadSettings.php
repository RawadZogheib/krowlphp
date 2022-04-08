<?php 
 
 //SETTINGS 

require '(Control)versionTest.php'; 
if(require '(Control)tokenCheck.php'){
 
    if(!empty($data->account_Id)){
        
        $account_Id = htmlspecialchars($data->account_Id);
        $json_array[0] = 'error4';
        $settings = array();
        
        require '(Model)loadSettings.inc.php';
        if(mysqli_num_rows($xx)>0){
           $res = mysqli_fetch_assoc($xx);	
            array_push($settings,$res["first_name"],$res["last_name"],$res["email"],$res["username"],$res["bio"],$res["date_of_birth"],$res["university_ids"],$res["major_degree_ids"],$res["minor_degree_ids"]);
            	
            $json_array[0]="success";
            $json_array[1]=$settings;
        }    

            echo json_encode($json_array);

            mysqli_close($con);

    }else require '(View)Error7.php';
}
?>