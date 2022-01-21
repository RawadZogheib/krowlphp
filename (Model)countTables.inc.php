<?php

	$sql="SELECT count(*)as nbr FROM `tables` WHERE `table_uni` = '".$user_uni."'";

	$xx = mysqli_query($con,$sql);
	$res = mysqli_fetch_assoc($xx);

?>