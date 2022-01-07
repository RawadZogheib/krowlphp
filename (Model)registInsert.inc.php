<?php 
		$sql="INSERT INTO `account` (`account_Id`, `email`, `first_name`, `last_name`, `username`, `password`, `date_of_birth`, `photo`, `terms_of_service`, `crop_x`, `crop_y`, 
										`crop_width`, `crop_height`, `university_ids`, `major_degree_ids`, `minor_degree_ids`, `vcode`,`chat_id`) 
		VALUES (NULL, '".$email."', '".$first_name."', '".$last_name."', '".$username."', '".$hash."', '".$date_of_birth."', '".$photo."', '".$terms_of_service."', 
										'".$crop_x."', '".$crop_y."','".$crop_width."', '".$crop_height."', '".$university_ids."', '".$major_degree_ids."', 
										'".$minor_degree_ids."', '".$vCode."',0)";
		$yy=mysqli_query($con,$sql);
?>


