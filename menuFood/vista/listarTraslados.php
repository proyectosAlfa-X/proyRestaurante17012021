
<?php
require_once('../conexion/conexion2.php');
session_start();
if(!isset($_SESSION["usuario"])){
//$user=$_SESSION['usuario']
    header("location:../login/cierre.php"); // escribir en todas las pag
}/*else
if($_SESSION['rol']!='operador'){
  header("location:../login/login.html"); // escribir en todas las pag
}*/
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    
    <link rel="stylesheet" type="text/css" href="../css/estilos2.css">
    <link rel="stylesheet" type="text/css" href="../css/csst.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script type ="text/javascript" src="../css/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript" src="../js/habilitaDesabInput.js"></script>
    <script type="text/javascript" src="../controlador/productos.js"></script>
    <script type="text/javascript" src="../toastr-master/toastr.js"></script>
    <script type="text/javascript" src="https://spin.js.org/spin.js"></script>
    <link rel="stylesheet" type="text/css" href="../toastr-master/toastr.scss"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link href="http://codeseven.github.com/toastr/toastr-responsive.css" rel="stylesheet"/>-->
    

	
	
	
</head>
<body>
    <script type="text/javascript">
    $(window).load(function() {
    $(".loader").fadeOut("slow");
    });
  </script>
    <div class="loader"></div>
  
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn" style="margin-top: -3px;">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">RICODELI</label>
      <ul>
        <li><a  class="active" style="text-decoration: none;" href="../MenuPrincipal.php">MEN&Uacute; PRINCIPAL</a></li>
        <li><a href="#" style="text-decoration: none;">FACTURACION</a></li>
        <li><a href="#"style="text-decoration: none;">COMPRAS</a></li>
        <li><a href="#" style="text-decoration: none;">MANUAL</a></li>
        <li><a class="" style="text-decoration: none;" href="../login/cierre.php" >CERRAR SESI&Oacute;N</REPORTE></a></li>
      </ul>
  </nav>  

<div class="panel panel-default">
      <div class="panel-heading" style="background-color:#FDFEFE;">
        <h2 class="panel-title" style=" text-align: center; width: 100%; height: 20px; font-size: 20px; margin-bottom: 0px;">LISTA DE TRASLADOS</h2>
      <div class="row vertical-align voy" style="margin-bottom: 0px;">
        
        <script type="text/javascript">
          listar_dato_traslado();
        </script>
        <div id="panel_listado_T"></div>
      </body>
    </div>
  </div>
</div>
    

  <div class="row vertical-align" style="margin-top: 0px;">
<footer>
Servicios Tecnologicos ALFA-X
<BR>
GUATEMALA, CENTROAMERICA<BR>
TEL:    
</footer>
</div>
</html>