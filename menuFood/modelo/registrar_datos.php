<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
</head>
<body>


<!--estos ya son archivos que yo almacene en la carpeda de modelo ya que contienen php puro mas que todo las consultas y asignacion de variables hay que poner mucha atencion a los siguiente 

$variable esta es la variable de php a la que se le va a asignar = $_POST['variable del data de javascript']-->
<?php 
//recorda que esto es para llamar a la conexion 
//recorda que esto es para llamar a la conexion 
include("../../conexion/conexion2.php");

 $idTipoMenu = $_POST['idTipoMenu']; echo "</br>";
 $nombreMenu = $_POST['nombreMenu']; echo "</br>";
 $descripcionMenu = $_POST['descripcionMenu']; echo "</br>";
 $estadoMenu = $_POST['estadoMenu']; echo "</br>";
 $costoMenu = $_POST['costoMenu']; echo "</br>";
 $precioVentaMenu = $_POST['precioVentaMenu']; echo "</br>";
 $imagen = $_POST['imagenMenu']; echo "</br>";
 $url= substr($imagen, 11);   

 //variable de conexion y de consulta ue lleva el procedimiento que se declaro en la base de datos 
 $db= Conexion::StartUp(); 
 try {
 	$guarda=$db->prepare("INSERT INTO menu (idMenu, idTipoMenu, nombreMenu,descripcionMenu,estadoMenu,costoMenu,precioVentaMenu,imagenMenu) values(null,'$idTipoMenu','$nombreMenu','$descripcionMenu','$estadoMenu','$costoMenu','$precioVentaMenu','$url')");
 	$guarda->execute();
 	
 	if($guarda==TRUE){

?>
 <!--print "<script>alert(\"Registro guardado exitosamente.\");window.history.back();</script>";-->
<div class="alert alert-success" role="alert">
  Registro ingresado con &eacute;xito!
</div>
<?php 
}else{ ?>
	<div class="alert alert-danger" role="alert">
  Datos no ingresados!
</div>
<?php 
}
}catch (Exception $e){
	 die("error".$e->getMessage());
       
       }   
?>
</body>
</html>
     	