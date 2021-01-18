<html>
<head>
<script type="text/javascript" src="../controlador/productos.js"></script>
</head>
<body>

<!--este es otro archivo de la carpeta modelo ya  que es php y consulta -->
<?php 
require_once('../conexion/conexion2.php');
//se mandan a llamar los datos del javascript  del arreglo del ob de tipo POST
 $idProducto = $_POST['idProducto']; 
 $nombreProducto = $_POST['nombreProducto']; 
 $idTipoProducto= $_POST['idTipoProducto']; 
 $idUnidadMedida = $_POST['idUnidadMedida']; 
 $fechaIngresoProducto = $_POST['fechaIngresoProducto']; 
 $fechaVencimientoProducto = $_POST['fechaVencimientoProducto']; 
 $estadoProducto = $_POST['estadoProducto']; 
 $idSucursal = $_POST['idSucursal']; 
 $costoProducto = $_POST['costoProducto']; 
 $stockProducto = $_POST['stockProducto']; 

 echo ($idProducto." ".$nombreProducto." ".$idTipoProducto." ".$idUnidadMedida." ".$fechaIngresoProducto." ".$fechaVencimientoProducto." ".$estadoProducto." ".$idSucursal." ".$costoProducto." ".$stockProducto);
 
 //variables de conexion y consulta que contiene el procedimiento almacenado que se declaro en la base de datos en phpMyAdmin
 $db4 = Conexion::StartUp();       
 try { 	   
 $guarda22=$db4->query("CALL actualizar('$idProducto', '$nombreProducto', '$idTipoProducto', '$idUnidadMedida', '$fechaIngresoProducto', '$fechaVencimientoProducto', '$estadoProducto', '$idSucursal', '$costoProducto', '$stockProducto')");
 	if($guarda22==TRUE){

?>
 <!--print "<script>alert(\"Registro guardado exitosamente.\");window.history.back();</script>";-->
<div class="alert alert-success" role="alert">
  Registro Modificado con &eacute;xito!
</div>
<?php 
}else{ ?>
	<div class="alert alert-danger" role="alert">
  Datos no Modificado exitosamente !
</div>
<?php 
}

}catch (Exception $e){
	 die("error".$e->getMessage());
       
       }   
?>
</body>
</html>