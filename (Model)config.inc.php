<?php

	function con() {
		$con = mysqli_connect("127.0.0.1","root","gU4YTcNMe3AEPY7M","krowl")or die("Failed to connect... Try again in few seconds");
		return $con;
	}

?>