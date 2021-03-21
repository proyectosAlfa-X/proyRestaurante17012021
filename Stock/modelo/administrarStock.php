<?php
//incluye la clase Libro y CrudLibro
require_once('../controlador/crudStock.php');
require_once('../modelo/stock.php');

$crud = new CrudStock();
$stock = new Stock();

	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {
		$stock->setIdProducto($_POST['idProducto']);
		$stock->setIdSucursal($_POST['idSucursal']);
		$stock->setFechaIngresoSucursal($_POST['fechaIngresoSucursal']);
		$stock->setDescripcionStock($_POST['descripcionStock']);
		$stock->setEstadoStock($_POST['estadoStock']);
		$stock->setCantidad($_POST['cantidad']);
		$crud->insertar($stock);
		header('Location: ../vista/index.php');

		//echo "registros guardados";

		}
?>