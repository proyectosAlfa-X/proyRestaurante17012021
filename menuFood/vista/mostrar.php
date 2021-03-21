<?php
//incluye la clase Libro y CrudLibro
require_once('../Controlador/crudProducto.php');
require_once('../Modelo/producto.php');
$crud=new CrudProducto();
$producto= new Producto();
//obtiene todos los libros con el método mostrar de la clase crud
$listaProductos=$crud->mostrar();
?>

<html>
<head>
	<title>Mostrar Prodcutos</title>
</head>
<body>
	<table border=1>
		<head>
			<td>ID</td>
			<td>Nombre</td>
			<td>Tipo de Producto</td>
			<td>Unidad de Medida</td>
			<td>Fecha Ingreso Producto</td>
			<td>Fecha Vencimiento</td>
			<td>Estado Producto</td>
			<td>Sucursal</td>
			<td>Costo Producto</td>
			<td>Stock/existencia</td>
			<td>Actualizar</td>
			<td>Eliminar</td>
		</head>
		<body>
			<?php foreach ($listaProductos as $producto) {?>
			<tr>
				<td><?php echo $producto->getIdProducto() ?></td>
				<td><?php echo $producto->getNombreProducto() ?></td>
				<td><?php echo $producto->getIdTipoProducto() ?></td>
				<td><?php echo $producto->getIdUnidadMedida()?> </td>
				<td><?php echo $producto->getFechaIngresoProducto() ?></td>
				<td><?php echo $producto->getFechaVencimientoProducto() ?></td>
				<td><?php echo $producto->getEstadoProducto()?> </td>
				<td><?php echo $producto->getIdSucursal() ?></td>
				<td><?php echo $producto->getCostoProducto() ?></td>
				<td><?php echo $producto->getStockProducto()?> </td>
				<td><a href="actualizar.php?idProducto=<?php echo $producto->getIdProducto() ?>&accion=a">Actualizar</a> </td>
				<td><a href="../modelo/administrarProducto.php?idProducto=<?php echo $producto->getIdProducto()?>&accion=e">Eliminar</a>   </td>
			</tr>
			<?php }?>
		</body>
	</table>
	<a href="index2.php">Volver</a>
</body>
</html>