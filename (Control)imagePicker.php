<?php

    $image = $_FILES['image']['name'];
    $name = $_POST['name'];

    $imagePath= 'D:/wamp64/www/krowl/uploads/'.$image;
    $tmp_name=$_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name,$imagePath);
    

  echo "joiuroir";
?>