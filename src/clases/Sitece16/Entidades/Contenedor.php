<?php
/**
 * Implementacion simple de servicios mediante IoC.
 * 
 * La clase Contenedor almacena instancias de diferentes servicios para 
 * referenciarlos de manera unica a las demas clases y objetos que los requieran
 * emulando un modelo IoC. Recibe un array con el nombre de los servicios a
 * instanciar y otro con los parametros de estos servicios. Este archivo es 
 * parte de la libreria Sitece16.
 * 
 * @author Javier Gutiérrez Herrera 
 * 
 * @method     class __call($_instancias[] $args ) Usado para llamar al servicio
 *             directamente por el nombre abreviado.
 * 
 * @var $_instancias array()	Arreglo con los servicios instanciados
 * @var $_params	 array()	Arreglo con los parametros de cada servicio
 */
class Contenedor
{
	private $_instancias = array();
	private $_params = array();

	/**
	 * Constructor de la clase Conenedor
	 * 
	 * @param      array()  $serv    Arreglo con las clases a instanciar
	 * @param      array()  $params  Parametros de configuracion de cada clase
	 */
	public function __construct($serv = array(), $params = array()){
		$this->_params = $params;
		foreach ($servicio as $servicios => $clase) {
			$this->init($servicio, $clase, $params[$servicio]);
		}
	}

	/**
	 * Carga e inicializa las instancias de servicios	
	 * 
	 * @param  string $descCorta Nombre abreviado del servicio
	 * @param  class  $clase     Objeto o FQN de la clase a instanciar
	 * @param  string $params    Parametros de inicializacion del servicio
	 * @return bool              True si la carga fue exitosa
	 */
	private function init($descCorta, $clase, $params) {
		$this->_instancias['$desccorta'] = new ($clase)($params);
		return false;
	}

	/**
	 * Devuelve un string con los nombres de las instancias 
	 * 
	 * @return string Servicios instanciados separados por coma
	 */
	public function getInstancias(){
		return implode(',', $this->_instancias);
	}

	/**
	 * Vacia el contenedor, y lo vuelve a cargar con estas instancias
	 * @param array $serv   Arreglo con los servicios a instanciar
	 * @param array $params Parametros de los servicios a instanciar
	 */
	public function setInstancias($serv = array(), $params = array()){
		$this->_instancias = $serv;
	}

	// Recibe un nombre corto de funcion y la Clase que debe ser instanciada 
	// opcionalmente se pueden mandar argumentos separados por coma 
	
	/**
	 * Funcion que referencia a los servicios por su abreviatura
	 * @param  string $abrev Nombre abreviado del servicio a llamar
	 * @param  string $args  Argumentos que requiera el servicio, o null
	 * @return class         Devuelve la instancia del servicio
	 */
	public function __call($abrev, $args){
		$clase_y_args = explode(',',$args, 2)
		$clase = 

		if (empty($this->_instancias[$class]) || 
			!is_a($this->_instancias[$class], "$class"))
			$this->_instancias[$class] = new $class($args);
		return $this->_instancias['$class'];
	}
}