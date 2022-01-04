<?php
		$sql="SELECT `userId` as userId FROM user WHERE `email` = '".$email."'";
		$xx = mysqli_query($con,$sql);
		$res = mysqli_fetch_assoc($xx);
?>