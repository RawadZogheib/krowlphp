<?php

	$sql="SELECT count(*) as nbr,`request` FROM `friendships` WHERE `id1` = '".$initial."' AND `id2` = '".$account_Id."' OR `id1` = '".$account_Id."' AND `id2` = '".$initial."'";

	$yy7 = mysqli_query($con,$sql);
	


    



?>