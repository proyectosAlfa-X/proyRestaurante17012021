<?php
//incluye la clase Libro y CrudLibro
require_once('../controlador/crudProducto.php');
require_once('../modelo/producto.php');

$crud = new CrudProducto();
$producto = new Producto();

	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {
		$producto->setNombreProducto($_POST['nombreProducto']);
		$producto->setIdTipoProducto($_POST['idTipoProducto']);
		$producto->setIdUnidadMedida($_POST['idUnidadMedida']);
		$producto->setFechaIngresoProducto($_POST['fechaIngresoProducto']);
		$producto->setFechaVencimientoProducto($_POST['fechaVencimientoProducto']);
		$producto->setEstadoProducto($_POST['estadoProducto']);
		$producto->setIdSucursal($_POST['idSucursal']);
		$producto->setCostoProducto($_POST['costoProducto']);
		$producto->setStockProducto($_POST['stockProducto']);	
		//llama a la función insertar definida en el crud
		$crud->insertar($producto);
		header('Location: ../vista/index.php');

		//echo "registros guardados";

		}
?>