<html>
<head>
	
</head>
<body>


<!--estos ya son archivos que yo almacene en la carpeda de modelo ya que contienen php puro mas que todo las consultas y asignacion de variables hay que poner mucha atencion a los siguiente 

$variable esta es la variable de php a la que se le va a asignar = $_POST['variable del data de javascript']-->
<?php 
//recorda que esto es para llamar a la conexion 
include("../login/verificaInicioSesion.php");//llamar en todas las paginas
//recorda que esto es para llamar a la conexion 
include("../conexion/conexion2.php");


$fechaTraslado = $_POST['fechaTraslado'];
$idUsuarioEnvia = $_POST['idUsuarioEnvia'];
$idSucursalEnvia = $_POST['idSucursalEnvia'];
$descripcionProdcto = $_POST['descripcionProdcto'];
$idSucursalRecibe = $_POST['idSucursalRecibe'];
$estadoTraslado = $_POST['estadoTraslado'];
$descripcionT = $_POST['descripcionT'];
$cantidadTraslado = $_POST['cantidadTraslado'];

 //variable de conexion y de consulta ue lleva el procedimiento que se declaro en la base de datos 
 $db= Conexion::StartUp(); 
 try {
 	$guarda=$db->prepare("INSERT INTO  trasladoproducto (idSucursalEnvia, idUsuarioEnvia, idProducto, idSucursalRecibe, descripcionTraslado, fechaTraslado,estadoTraslado, cantidadTraslado) VALUES ('$idSucursalEnvia','$idUsuarioEnvia','$descripcionProdcto','$idSucursalRecibe','$descripcionT','$fechaTraslado','$estadoTraslado','$cantidadTraslado')");



 	$guarda->execute();
 	
 	if($guarda==TRUE){

?>
 <!--print "<script>alert(\"Registro guardado exitosamente.\");window.history.back();</script>";-->
<div class="alert alert-success" role="alert">
  El traslado ha sido creado con &eacute;xito!
</div>
<?php 
}else{ ?>
	<div class="alert alert-danger" role="alert">
  Traslado no creado! verifique la informac&iacute;on
</div>
<?php 
}
}catch (Exception $e){
	 die("error".$e->getMessage());
       
       }   
?>
</body>
</html>
     	