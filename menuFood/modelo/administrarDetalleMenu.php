<?php
//incluye la clase Libro y CrudLibro
require_once('../controlador/crudMenu.php');
require_once('../modelo/menu.php');

$crud = new CrudDetalleMenu();
$menu = new DetalleMenu();

	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {
		$menu->setIdProducto($_POST['idMenu']);
		$menu->setIdTipoMenu($_POST['idTipoMenu']);
		$menu->setNombreMenu($_POST['nombreMenu']);
		$menu->setDescripcionMenu($_POST['descripcionMenu']);
		$menu->setEstadoMenu($_POST['estadoMenu']);
		$menu->setCostoMenu($_POST['costoMenu']);
		$menu->setPrecioVentaMenu($_POST['precioVentaMenu']);
		$menu->setImagenMenu($_POST['imagenMenu']);
		$crud->insertar($menu);
		header('Location: ../vista/index.php');

		//echo "registros guardados";

		}
?>