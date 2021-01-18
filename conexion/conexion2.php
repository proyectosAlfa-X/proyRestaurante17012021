<?php
	/*class  Db{
		private static $conexion=NULL;
		private function __construct (){}

		public static function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion= new PDO('mysql:host=localhost;dbname=32cia','root','',$pdo_options);
			return self::$conexion;
		}		
	} 
?>*/
class Conexion

{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=ricodellidb;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}
?>