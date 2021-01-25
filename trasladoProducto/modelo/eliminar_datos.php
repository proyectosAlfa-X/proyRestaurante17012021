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
 $img4= $_POST['img4'];
 echo ($idProducto." ".$img4);
 
 //variables de conexion y consulta que contiene el procedimiento almacenado que se declaro en la base de datos en phpMyAdmin
 $db4 = Conexion::StartUp();       
 try { 	   
 $guarda22=$db4->query("CALL eliminar('$idProducto')");
 	if($guarda22==TRUE){
 		 unlink("../".$img4) 

?>
 <!--print "<script>alert(\"Registro guardado exitosamente.\");window.history.back();</script>";-->
<div class="alert alert-success" role="alert">
  Registro Eliminado con &eacute;xito!
</div>
<?php 
}else{ ?>
	<div class="alert alert-danger" role="alert">
  Datos no Eliminado exitosamente !
</div>
<?php 
}

}catch (Exception $e){
	 die("error".$e->getMessage());
       
       }   
?>
</body>
</html>