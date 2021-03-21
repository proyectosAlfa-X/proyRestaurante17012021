<html>
<head>
<script type="text/javascript" src="../controlador/stock.js"></script>
</head>
<body>

<!--este es otro archivo de la carpeta modelo ya  que es php y consulta -->
<?php 
require_once('../../conexion/conexion2.php');
//se mandan a llamar los datos del javascript  del arreglo del ob de tipo POST
 $idStock = $_POST['idStock']; 
 $idProducto = $_POST['idProducto']; 
 $idSucursal= $_POST['idSucursal']; 
 $fechaIngresoSucursal = $_POST['fechaIngresoSucursal']; 
 $descripcionStock = $_POST['descripcionStock']; 
 $estadoStock = $_POST['estadoStock']; 
 $cantidad = $_POST['cantidad']; 
 

 
 //variables de conexion y consulta que contiene el procedimiento almacenado que se declaro en la base de datos en phpMyAdmin
 $db4 = Conexion::StartUp();       
 try { 	   
 	
 $guarda22=$db4->query("CALL actualizarStock('$idStock', '$idProducto', '$idSucursal','$fechaIngresoSucursal', '$descripcionStock', '$estadoStock', '$cantidad')");
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