<?php
		$sql="SELECT MAX(user_id)as lastId FROM user";
		$xx = mysqli_query($con,$sql);
		$res = mysqli_fetch_assoc($xx);
?>