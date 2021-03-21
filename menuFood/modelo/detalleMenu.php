

<?php
class DetalleMenu{
		private $idDetalleMenu;
		private $idMenu;
		private $idStock;
		private $cantidadDetalleMenu;
		
		
		function __construct(){}

		public function getIdDetalleMenu(){
		return $this->idDetalleMenu;
		}

		public function setIdDetalleMenu($idDetalleMenu){
			$this->idDetalleMenu = $idDetalleMenu;
		}

		public function getIdMenu(){
			return $this->idMenu;
		}

		public function setIdMenu($idMenu){
			$this->idMenu = $idMenu;
		}

		public function getIdStock(){
		return	$this->idStock;
		}

		public function setIdStock($idStock){
			$this->idStock = $idStock;
		}

		public function getCantidadDetalleMenu(){
		return $this->cantidadDetalleMenu;
		}

		public function setCantidadDetalleMenu($cantidadDetalleMenu){
			$this->cantidadDetalleMenu=$cantidadDetalleMenu;
		}
		
	}

?>