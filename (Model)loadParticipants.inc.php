<?php 


	$sql= "SELECT a.`account_Id`, a.`username`,a.`photo FROM `participants`p JOIN `account`a ON p.`account_Id`=a.`account_Id` WHERE o.`table_id` =$table_id";

	$yy1 = mysqli_query($con,$sql);
	

?>