<?php

	$sql="SELECT count(*) as nbr FROM `friendships` WHERE `id1` = '".$account_Id."' AND `id2` = '".$student_id."' OR `id1` = '".$student_id."' AND `id2` = '".$account_Id."'";

	$yy = mysqli_query($con,$sql);
	$res3 = mysqli_fetch_assoc($yy);


    



?>