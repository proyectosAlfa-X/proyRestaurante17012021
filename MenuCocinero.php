<?php
session_start();
if(!isset($_SESSION["usuario"])){
//$user=$_SESSION['usuario']
    header("location:login/cierre.php"); // escribir en todas las pag
}/*else
if($_SESSION['rol']!='operador'){
  header("location:../login/login.html"); // escribir en todas las pag
}*/
?>
<html>
<head>
<title>Men&uacute; Principal</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
<meta name="viewport" content="width=device-width, initial-scala=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos2.css">
    <link rel="stylesheet" type="text/css" href="css/csst.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script serc="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo">RICODELI</label>
    <ul>
       <li><a  class="active" style="text-decoration: none;" href="MenuPrincipal.php">MEN&Uacute; PRINCIPAL</a></li>
        <li><a href="#" style="text-decoration: none;">FACTURACION</a></li>
        <li><a href="#"style="text-decoration: none;">COMPRAS</a></li>
        <li><a href="#" style="text-decoration: none;">MANUAL</a></li>
        <li><a class="" style="text-decoration: none;" href="login/cierre.php" >CERRAR SESI&Oacute;N</REPORTE></a></li>
    </ul>
</nav>

</head>
<body>
 
		<div>
		<h3 class="text-center"><b class="text-info">RICODELI </b></h3>
		</div>
		<h3 class="text-center"><b class="text-info">Men&uacute; dee Cocinero</b></h3>
		<form action="" method="post">
		<!-- primera columna -->

	<!-- tercera columna-->
	
<div class="form-group">
<div class="row" style="width:600px;
    height:400px;
    line-height:400px;
    margin:0px auto;
    text-align:center;">
	<!-- primera columna-->
	<div class="col-md-12" >
	<a href="menuMeseroM.php"><img class="img-thumbnail imagen"  src="img/Diapositiva23.png" alt="" /></a>
	</div>
    </div>
	<!-- segunda columna-->
	
   
 
	<!-- primera columna-->
	
</div>
  <h3 class="text-center texto-negro">Presione el bot&oacute;n correspondiente</h3><br>
</form>

</body>

</html>