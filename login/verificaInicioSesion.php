<?php
session_start();
if(!isset($_SESSION["usuario"])){
//$user=$_SESSION['usuario']
    header("location:../login/cierre.php"); // escribir en todas las pag
}/*else
if($_SESSION['rol']!='operador'){
  header("location:../login/login.html"); // escribir en todas las pag
}*/
?>