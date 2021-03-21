

<?php
class Stock{
		private $idStock;
		private $idProducto;
		private $idSucursal;
		private $fechaIngresoSucursal;
		private $descripcionStock;
		private $estadoStock;
		private $cantidad;
		private $imagenProducto;
		

		function __construct(){}


		public function getIdStock(){
		return $this->idStock;
		}

		public function setIdStock($idStock){
			$this->idStock = $idStock;
		}

		public function getIdProducto(){
		return $this->idProducto;
		}

		public function setIdProducto($idProducto){
			$this->idProducto = $idProducto;
		}

		public function getIdSucursal(){
			return $this->idSucursal;
		}

		public function setIdSucursal($idSucursal){
			$this->idSucursal = $idSucursal;
		}

		
		public function getFechaIngresoSucursal(){
			return $this->fechaIngresoSucursal;
		}

		public function setFechaIngresoSucursal($fechaIngresoSucursal){
			$this->fechaIngresoSucursal = $fechaIngresoSucursal;
		}


		public function getEstadoStock(){
			return $this->estadoStock;
		}

		public function getDescripcionStock(){
			return $this->descripcionStock;
		}

		public function setDescripcionStock($descripcionStock){
			$this->descripcionStock = $descripcionStock;
		}

		public function setEstadoStock($estadoStock){
			$this->estadoStock = $estadoStock;
		}
		
		public function getCantidad(){
			return $this->cantidad;
		}

		public function setCantidad($cantidad){
			$this->cantidad=$cantidad;
		}

			public function getImagenProducto(){
			return $this->imagenProducto;
		}

		public function setImagenProducto($imagenProducto){
			$this->imagenProducto=$imagenProducto;
		}


	}

?>