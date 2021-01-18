<?php
class Producto{
		private $idProducto;
		private $nombreProducto;
		private $idTipoProducto;
		private $idUnidadMedida;
		private $fechaIngresoProducto;
		private $fechaVencimientoProducto;
		private $estadoProducto;
		private $idSucursal;
		private $costoProducto;
		private $stockProducto;

		function __construct(){}

		public function getIdProducto(){
		return $this->idProducto;
		}

		public function setIdProducto($idProducto){
			$this->idProducto = $idProducto;
		}

		public function getNombreProducto(){
			return $this->nombreProducto;
		}

		public function setNombreProducto($nombreProducto){
			$this->nombreProducto = $nombreProducto;
		}

		public function getIdTipoProducto(){
		return $this->idTipoProducto;
		}

		public function setIdTipoProducto($idTipoProducto){
			$this->idTipoProducto = $idTipoProducto;
		}
		public function getIdUnidadMedida(){
			return $this->idUnidadMedida;
		}

		public function setidUnidadMedida($idUnidadMedida){
			$this->idUnidadMedida = $idUnidadMedida;
		}

		public function getFechaIngresoProducto(){
			return $this->fechaIngresoProducto;
		}

		public function setFechaIngresoProducto($fechaIngresoProducto){
			$this->fechaIngresoProducto = $fechaIngresoProducto;
		}

		public function getFechaVencimientoProducto(){
			return $this->fechaVencimientoProducto;
		}

		public function setFechaVencimientoProducto($fechaVencimientoProducto){
			$this->fechaVencimientoProducto = $fechaVencimientoProducto;
		}

		public function getEstadoProducto(){
			return $this->estadoProducto;
		}

		public function setEstadoProducto($estadoProducto){
			$this->estadoProducto = $estadoProducto;
		}
		public function getIdSucursal(){
			return $this->idSucursal;
		}

		public function setIdSucursal($idSucursal){
			$this->idSucursal = $idSucursal;
		}
		public function getCostoProducto(){
			return $this->costoProducto;
		}

		public function setCostoProducto($costoProducto){
			$this->costoProducto=$costoProducto;
		}

		public function getStockProducto(){
			return $this->stockProducto;
		}

		public function setStockProducto($stockProducto){
			$this->stockProducto = $stockProducto;
		}

	}

?>