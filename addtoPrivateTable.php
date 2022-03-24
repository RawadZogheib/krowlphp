<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.loader {
  position: absolute;
  top: 13%;
  left:33%;
  width: 50%;
  align-content: center;
  background: url(https://i.ibb.co/DrC70Hn/krowl-logo2.png) center no-repeat #fff;
  width:430px;
  height:400px;
  -webkit-animation: spin 15s linear infinite; /* Safari */
  animation: spin 15s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotateY(0deg); }
  100% { -webkit-transform: rotateY(360deg); }
}

@keyframes spin {
  0% { transform: rotateY(0deg); }
  100% { transform: rotateY(360deg); }
}
</style>
</head>
<body>

<p style="align-content:center"><div class="loader"></div></p>

</body>
</html>
<?php 
$private = htmlspecialchars($_GET["private"]);
shell_exec("start http://10.10.4.53:8080/web/?PRIVATE=$private");

//system("flutter run --dart-define=PRIVATE=$private"); //sending the table code to the flutter app 
?>