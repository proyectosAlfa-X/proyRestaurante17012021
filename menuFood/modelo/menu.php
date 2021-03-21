

<?php
class Menu{
		private $idMenu;
		private $idTipoMenu;
		private $nombreMenu;
		private $descripcionMenu;
		private $estadoMenu;
		private $costoMenu;
		private $precioVentaMenu;
		private $imagenMenu;
		
		function __construct(){}

		public function getIdMenu(){
		return $this->idMenu;
		}

		public function setIdMenu($idMenu){
			$this->idMenu = $idMenu;
		}

		public function getIdTipoMenu(){
			return $this->idTipoMenu;
		}

		public function setIdTipoMenu($idTipoMenu){
			$this->idTipoMenu = $idTipoMenu;
		}

		public function getNombreMenu(){
		return $this->nombreMenu;
		}

		public function setNombreMenu($nombreMenu){
			$this->nombreMenu = $nombreMenu;
		}
		public function getDescripcionMenu(){
			return $this->descripcionMenu;
		}

		public function setDescripcionMenu($descripcionMenu){
			$this->descripcionMenu = $descripcionMenu;
		}

		public function getEstadoMenu(){
			return $this->estadoMenu;
		}

		public function setEstadoMenu($estadoMenu){
			$this->estadoMenu = $estadoMenu;
		}

		public function getCostoMenu(){
			return $this->costoMenu;
		}

		public function setCostoMenu($costoMenu){
			$this->costoMenu = $costoMenu;
		}

		public function getPrecioVentaMenu(){
			return $this->precioVentaMenu;
		}

		public function setPrecioVentaMenu($precioVentaMenu){
			$this->precioVentaMenu=$precioVentaMenu;
		}

		public function getImagenMenu(){
			return $this->imagenMenu;
		}

		public function setImagenMenu($imagenMenu){
			$this->imagenMenu=$imagenMenu;
		}
	}

?>