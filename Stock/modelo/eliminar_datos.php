<html>
<head>

</head>
<body>

<!--este es otro archivo de la carpeta modelo ya  que es php y consulta -->
<?php 
require_once('../../conexion/conexion2.php');
//se mandan a llamar los datos del javascript  del arreglo del ob de tipo POST
 $idStock = $_POST['idStock']; 
 
 echo ($idStock);
 
 //variables de conexion y consulta que contiene el procedimiento almacenado que se declaro en la base de datos en phpMyAdmin
 $db4 = Conexion::StartUp();       
 try { 	   
 $guarda22=$db4->query("CALL eliminarStock('$idStock')");
 	if($guarda22==TRUE){
 		 

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