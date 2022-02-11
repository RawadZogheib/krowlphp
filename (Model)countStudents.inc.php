<?php

	$sql="SELECT count(*) as nbr FROM `account` WHERE `university_ids` <> ''"; //where univeristy_ids are not null

	$zz = mysqli_query($con,$sql);
	$res1 = mysqli_fetch_assoc($zz);



?>