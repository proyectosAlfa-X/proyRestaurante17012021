<?php
class Producto{
		private $idTrasladoProducto;
		private $idSucursalEnvia;
		private $idUsuarioEnvia;
		private $idUsuarioRecibe;
		private $idProducto;
		private $idSucursalRecibe;
		private $descripcionTraslado;
		private $fechaTraslado;
		private $motivoRespuestaTraslado;
		private $fechaConfirmacionTraslado;
		private $estadoTraslado;

		function __construct(){}

		public function getIdTrasladoProducto(){
		return $this->idTrasladoProducto;
		}

		public function setIdTrasladoProducto($idTrasladoProducto){
			$this->idTrasladoProducto = $idTrasladoProducto;
		}


		public function getIdSucursalEnvia(){
		return $this->idSucursalEnvia;
		}

		public function setIdSucursalEnvia($idSucursalEnvia){
			$this->idSucursalEnvia = $idSucursalEnvia;
		}


		public function getIdUsuarioEnvia(){
			return $this->idUsuarioEnvia;
		}

		public function setIdUsuarioEnvia($idUsuarioEnvia){
			$this->idUsuarioEnvia = $idUsuarioEnvia;
		}


		public function getIdUsuarioRecibe(){
		return $this->idUsuarioRecibe;
		}

		public function setIdUsuarioRecibe($idUsuarioRecibe){
			$this->idUsuarioRecibe = $idUsuarioRecibe;
		}

		public function getIdProducto(){
		return $this->idProducto;
		}

		public function setIdProducto($idProducto){
			$this->idProducto = $idProducto;
		}

		public function getIdSucursalRecibe(){
		return $this->idSucursalRecibe;
		}

		public function setIdSucursalRecibe($idSucursalRecibe){
			$this->idSucursalRecibe = $idSucursalRecibe;
		}



		public function getDescripcionTraslado(){
			return $this->descripcionTraslado;
		}

		public function setDescripcionTraslado($descripcionTraslado){
			$this->descripcionTraslado = $descripcionTraslado;
		}


		public function getFechaTraslado(){
			return $this->fechaTraslado;
		}

		public function setFechaTraslado($fechaTraslado){
			$this->fechaTraslado = $fechaTraslado;
		}


		public function getMotivoRespuestaTraslado(){
			return $this->motivoRespuestaTraslado;
		}

		public function setMotivoRespuestaTraslado($motivoRespuestaTraslado){
			$this->motivoRespuestaTraslado = $motivoRespuestaTraslado;
		}


		public function getFechaConfirmacionTraslado(){
			return $this->fechaConfirmacionTraslado;
		}

		public function setFechaConfirmacionTraslado($fechaConfirmacionTraslado){
			$this->fechaConfirmacionTraslado = $fechaConfirmacionTraslado;
		}


		public function getEstadoTraslado(){
			return $this->EstadoTraslado;
		}

		public function setEstadoTraslado($estadoTraslado){
			$this->estadoTraslado = $estadoTraslado;
		}
		
	}

?>