 <!DOCTYPE html> 
	<?php //instead of account it was user 
    
		if(!empty($_GET['table_name']) && !empty($_GET['account']) && !empty($_GET['type'])){
			$room = '"vpaas-magic-cookie-5bea10f9861f4c588b1c164f2f3113de/'.htmlspecialchars($_GET['table_name']).'"';
      $account = htmlspecialchars("'".$_GET["account"]."'");
      $type = htmlspecialchars("".$_GET["type"]."");?>
      <form method="post" action="index1.php">
        <input value='DATAFLOW' name="name">
        <input type="silentoookdd" name="type">
      </form>
     <?php header("Location:index1.php");

      exit();
		}
    else{
      echo 'account id not found';
    }
	?>
  