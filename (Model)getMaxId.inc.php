<?php
		$sql="SELECT MAX(account_Id)as lastId FROM account";
		$xx = mysqli_query($con,$sql);
		$res = mysqli_fetch_assoc($xx);
?>