<?php
require_once('../../conexion/conexion.php');
include("../../login/verificaInicioSesion.php");//llamar en todas las paginas
$codUso = $_SESSION["codUsuario"];
$codS1 = $_SESSION["codSucursal"];



	class CrudFood{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo libro
		public function insertar($food){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO menu values(NULL,:idProducto,:idSucursal,:fechaIngresoSucursal,:descripcionStock,:estadoStock,:cantidad)');
			$insert->bindValue('idProducto',$stock->getIdProducto());
			$insert->bindValue('idSucursal',$stock->getIdSucursal());
			$insert->bindValue('fechaIngresoSucursal',$stock->getFechaIngresoSucursal());
			$insert->bindValue('descripcionStock',$stock->getDescripcionStock());
			$insert->bindValue('estadoStock',$stock->getEstadoStock());
			$insert->bindValue('cantidad',$stock->getCantidad());
			
			$insert->execute();

		}

		public function mostrar(){
			$db=Db::conectar();
			$listaStock=[];
			$codUso = $_SESSION["codUsuario"];
    		$codS1 = $_SESSION["codSucursal"];
			$select=$db->query("SELECT stock.idStock as 'idStock',
									   producto.nombreProducto as 'idProducto',
									   sucursal.NombreSucursal as 'idSucursal',
									   stock.fechaIngresoSucursal as 'fechaIngresoSucursal',
									   stock.descripcionStock as 'descripcionStock',
									   stock.estadoStock as 'estadoStock',
									   stock.cantidad as 'cantidad' FROM stock, sucursal, producto WHERE estadoStock='A' and producto.idProducto=stock.idProducto and sucursal.idSucursal=stock.idSucursal and stock.idSucursal='$codS1'");

			foreach($select->fetchAll() as $stock){
				$myStock= new Stock();

				$myStock->setIdStock($stock['idStock']);
				$myStock->setIdProducto($stock['idProducto']);
				$myStock->setIdSucursal($stock['idSucursal']);
				$myStock->setFechaIngresoSucursal($stock['fechaIngresoSucursal']);
				$myStock->setDescripcionStock($stock['descripcionStock']);
				$myStock->setEstadoStock($stock['estadoStock']);
				$myStock->setCantidad($stock['cantidad']);
				
				$listaStock[]=$myStock;
			}			
			return $listaStock;
		}

		// método para buscar un libro, recibe como parámetro el id del libro
		public function obtenerStock($idStock){
			$db=Db::conectar();
			$select=$db->prepare('SELECT stock.*, producto.imagenProducto as "imagenProducto" FROM stock, producto WHERE idStock=:idStock  and producto.idProducto = stock.idProducto and estadoStock="A"');
			$select->bindValue('idStock',$idStock);
			$select->execute();
			$stock=$select->fetch();
			$myStock= new Stock();
			$myStock->setIdStock($stock['idStock']);
			$myStock->setIdProducto($stock['idProducto']);
			$myStock->setIdSucursal($stock['idSucursal']);
			$myStock->setFechaIngresoSucursal($stock['fechaIngresoSucursal']);
			$myStock->setDescripcionStock($stock['descripcionStock']);
			$myStock->setEstadoStock($stock['estadoStock']);
			$myStock->setCantidad($stock['cantidad']);
			$myStock->setImagenProducto($stock['imagenProducto']);
			
			
			return $myStock;
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