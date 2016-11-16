<?php
/**
 * Conexion preconfigurada a servicio PDO
 * 
 * Devuelve una conexion a una base de datos MySQL en base a un archivo conf.ini
 * el cual contiene dos configuraciones diferentes a usar dependiendo si se 
 * esta ejecutando en modo desarrollo o en produccion. El archivo conf.ini debe
 * guardarse fuera de las carpetas accesibles mediante servicios web. Este 
 * archivo es parte de la libreria Sitece16.
 * 
 * @todo Establecer la ruta en parse_ini_file (linea 23) como constante estatica
 *       de la clase para facilitar el acceso al archivo .ini
 * 
 * @author Javier Gutiérrez Herrera 
 * 
 * uses       \PDO Devuelve una conexion/objeto PDO 
 * return     PDO Regresa un objeto PDO inicializado
 */
use \PDO;

class Database extends PDO
{
	public $conexion;

	function __construct() {
		$this->conf_ini = parse_ini_file("../../../dbconf.ini", true);
		$modo = (isset($_SERVER['WINDIR'])) ? 'desarrollo' : 'produccion';
		extract($this->conf_ini[$modo], EXTR_PREFIX_ALL, "DB");
		try {
			$this->conexion = new PDO("mysql:host={$DB_host};
									   dbname={$DB_name}",
									   $DB_user,
									   $DB_pass);
			if ($modo == 'desarrollo')
			 	$this->conexion->setAttribute(PDO::ATTR_ERRMODE, 
			 		PDO::ERRMODE_WARNING);
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
		return $this->conexion;
	}
}
