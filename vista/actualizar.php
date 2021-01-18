<?php
//incluye la clase Libro y CrudLibro
	require_once('../controlador/crudProducto.php');
require_once('../modelo/producto.php');
	$crud= new CrudProducto();
	$producto=new Producto();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$producto=$crud->obtenerProducto($_GET['idProducto']);
?>
<html>
<head>
	<title>Actualizar Producto</title>
</head>
<body>
	<form action='../modelo/administrarProducto.php' method='post'>
	<table>
		<tr>
			<input type='hidden' name='idProducto' value='<?php echo $producto->getIdProducto()?>'>
			<td>Nombre Producto:</td>
			<td> <input type='text' name='nombreProducto' value='<?php echo $producto->getNombreProducto()?>'></td>
		</tr>
		<tr>
			<td>Tipo Producto:</td>
			<td> <input type='text' name='idTipoProducto' value='<?php echo $producto->getIdTipoProducto()?>'></td>
		</tr>
		<tr>
			<td>Unidad de Medida:</td>
			<td> <input type='text' name='idUnidadMedida' value='<?php echo $producto->getIdUnidadMedida()?>'></td>
		</tr>
		<tr>
			<td>Fecha Ingreso Producto:</td>
			<td> <input type='text' name='fechaIngresoProducto' value='<?php echo $producto->getFechaIngresoProducto()?>'></td>
		</tr>
		<tr>
			<td>Fecha de Vencimiento Producto:</td>
			<td> <input type='text' name='fechaVencimientoProducto' value='<?php echo $producto->getFechaVencimientoProducto()?>'></td>
		</tr>
		<tr>
			<td>Estado Producto: </td>
			<td> <input type='text' name='estadoProducto' value='<?php echo $producto->getEstadoProducto()?>'></td>
		</tr>
		<tr>
			<td>Sucursal:</td>
			<td> <input type='text' name='idSucursal' value='<?php echo $producto->getIdSucursal()?>'></td>
		</tr>
		<tr>
			<td>Costo Producto:</td>
			<td> <input type='text' name='costoProducto' value='<?php echo $producto->getCostoProducto()?>'></td>
		</tr>
		<tr>
			<td>Stock Producto:</td>
			<td> <input type='text' name='stockProducto' value='<?php echo $producto->getStockProducto()?>'></td>
		</tr>

		<input type='hidden' name='actualizar' value='actualizar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="index2.php">Volver</a>
</form>
</body>
</html>