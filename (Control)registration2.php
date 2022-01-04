<?php
require '(Control)versionTest.php';
require '(Model)config.inc.php';

	$t1 = 0;
	$t2 = 0;
	$t3 = 0;

	$json_array = array();
	$uni_array = array();
    $maj_array = array();
    $min_array = array();
	$con=con();
    

    //Get Universities List
	
	require '(Model)getUniversitiesList.inc.php';
    if(mysqli_num_rows($xx)>0){
		$t1 = 1;
		while($res1 = mysqli_fetch_assoc($xx)){	

			$uni_array[] = array($res1["name_uni"]." - ".$res1["country_code"]);
		}	
	}else $uni_array[] = [];

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Get Universities List

    require '(Model)getMajorsList.inc.php';
    if(mysqli_num_rows($xx)>0){
		$t2 = 1;
		while($res1 = mysqli_fetch_assoc($xx)){	
			
			$maj_array[] = array($res1["name_maj"]);
		}	
	} else $maj_array[] = [];

	$json_array[0] = 'error4';
    $json_array[1] = $uni_array;
	$json_array[2] = $maj_array;

    //$una = json_encode($uni_array);
    //$maa = json_encode($maj_array);

	if($t1 == 1 && $t2 == 1){
		$json_array[0] = 'success';
	}
	//echo [$una,$maa,$mia];
    //echo '["'.$una.'","'.$maa.'","'.$mia.'"]';
    echo json_encode($json_array);

	mysqli_close($con);
    
?>