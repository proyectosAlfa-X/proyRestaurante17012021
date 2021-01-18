<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("location:login.html"); // escribir en todas las pag
}
?>
<h1>Bienvenidos Usuarios<h1>
<?php 
echo "Bienvenido".$_SESSION["usuario"];
?>
<p>Esta es informacion solo para usuarios registrados</p>
<p><a href="cierre.php">cerrar sesion</a></p>

</body>
</html>