<?php

	$sql="SELECT count(*) as nbr FROM `replies` WHERE `post_id`= '".$post_id.""; //where univeristy_ids are not null

	$zz1 = mysqli_query($con,$sql);
	$res2 = mysqli_fetch_assoc($zz1);



?>