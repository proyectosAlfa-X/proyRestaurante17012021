<?php
require_once('../../conexion/conexion.php');



	class CrudMenu{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo libro
		public function insertar($menu){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO menu values(NULL,:idTipoMenu,:nombreMenu,:descripcionMenu,:estadoMenu,:costoMenu,:precioVentaMenu, CONCAT("img/",:imagenMenu))');
			$insert->bindValue('idTipoMenu',$producto->getNombreProducto());
			$insert->bindValue('nombreMenu',$producto->getIdTipoProducto());
			$insert->bindValue('descripcionMenu',$producto->getIdUnidadMedida());
			$insert->bindValue('estadoMenu',$producto->getFechaIngresoProducto());
			$insert->bindValue('costoMenu',$producto->getFechaVencimientoProducto());
			$insert->bindValue('precioVentaMenu',$producto->getEstadoProducto());
			#$insert->bindValue('idSucursal',$producto->getIdSucursal());
			$insert->bindValue('imagenMenu',$producto->getImagenMenu());
			$insert->execute();

		}

		public function mostrar(){
			$db=Db::conectar();
			$listaProductos=[];
			
			$select=$db->query("SELECT *, tipoMenu.descripcionTipoMenu as idTipoMenu FROM menu, tipoMenu WHERE estadoMenu='A'and tipoMenu.idTipoMenu=menu.idTipoMenu");

			foreach($select->fetchAll() as $producto){
				$myProducto= new Menu();

				$myProducto->setIdMenu($producto['idMenu']);
				$myProducto->setIdTipoMenu($producto['idTipoMenu']);
				$myProducto->setNombreMenu($producto['NombreMenu']);
				$myProducto->setDescripcionMenu($producto['descripcionMenu']);
				$myProducto->setEstadoMenu($producto['estadoMenu']);
				$myProducto->setCostoMenu($producto['costoMenu']);
				$myProducto->setPrecioVentaMenu($producto['precioVentaMenu']);
				$listaProductos[]=$myProducto;
			}			
			return $listaProductos;
		}

		// método para buscar un libro, recibe como parámetro el id del libro
		public function obtenerProducto($idProducto){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM producto WHERE idProducto=:idProducto');
			$select->bindValue('idProducto',$idProducto);
			$select->execute();
			$producto=$select->fetch();
			$myProducto= new Producto();
			$myProducto->setIdProducto($producto['idProducto']);
			$myProducto->setNombreProducto($producto['nombreProducto']);
			$myProducto->setIdTipoProducto($producto['idTipoProducto']);
			$myProducto->setIdUnidadMedida($producto['idUnidadMedida']);
			$myProducto->setFechaIngresoProducto($producto['fechaIngresoProducto']);
			$myProducto->setFechaVencimientoProducto($producto['FechaVencimientoProducto']);
			$myProducto->setEstadoProducto($producto['estadoProducto']);
			#$myProducto->setIdSucursal($producto['idSucursal']);
			$myProducto->setCostoProducto($producto['costoProducto']);
			$myProducto->setStockProducto($producto['stockProducto']);
			$myProducto->setImagenProducto($producto['imagenProducto']);
			
			return $myProducto;
		}

		// método para actualizar un libro, recibe como parámetro el libro
		public function actualizar($producto){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE producto SET nombreProducto= :nombreProducto, idTipoProducto = :idTipoProducto, idUnidadMedida =  :idUnidadMedida,  fechaIngresoProducto = :fechaIngresoProducto, FechaVencimientoProducto = :fechaVencimientoProducto, estadoProducto = :estadoProducto, idSucursal = :idSucursal, costoProducto = :costoProducto, stockProducto = :stockProducto  WHERE idProducto = :idProducto');
			$actualizar->bindValue('idProducto',$producto->getIdProducto());
			$actualizar->bindValue('nombreProducto',$producto->getNombreProducto());
			$actualizar->bindValue('idTipoProducto',$producto->getIdTipoProducto());
			$actualizar->bindValue('idUnidadMedida',$producto->getIdUnidadMedida());
			$actualizar->bindValue('fechaIngresoProducto',$producto->getFechaIngresoProducto());
			$actualizar->bindValue('fechaVencimientoProducto',$producto->getFechaVencimientoProducto());
			$actualizar->bindValue('estadoProducto',$producto->getEstadoProducto());
			#$actualizar->bindValue('idSucursal',$producto->getIdSucursal());
			$actualizar->bindValue('costoProducto',$producto->getCostoProducto());
			$actualizar->bindValue('stockProducto',$producto->getStockProducto());
			$actualizar->execute();
		}

		// método para eliminar un libro, recibe como parámetro el id del libro
		public function eliminar($idProducto){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM producto WHERE idProducto=:idProducto');
			$eliminar->bindValue('idProducto',$idProducto);
			$eliminar->execute();
		}
}

?>