<?php
/**
 * Metodos comunes a todos los repositorios
 * 
 * La clase repositorio se instancia de manera diferente en cada clase que la 
 * utiliza, ya que cada entidad carga diferentes datos. Esta clase abstracta
 * contiene los metodos comunes a todas ellas. Define un método de llamadas por
 * cascada para estructurar consultas a la base de datos de una manera mas 
 * legible. 
 */
abstract class Repositorio 
{
	private $db; // Conexion a la db 
	private $comando1; // SELECT, UPDATE, DELETE, INSERT
	private $filtroCol = '*'; // * por default
	private $tabla;
	private $filtroWhere;
	private $comparaWhere;
	//private $resultado = array();

	/** 
	 * Constructor de la clase Repositorio
	 *
	 * Carga la conexion a db que se le haya asignado
	 */
	public function __construct(PDO $db) {
		$this->db = $db;
		$this->db->beginTransaction();	
		return $this;
	}

	/**
	 * Funcion sinonima a SELECT en SQL
	 * @param  string $tabla Nombre de la tabla a seleccionar
	 * @return Repositorio Se regresa a si misma para poder encadenar llamadas
	 */
	public function cargar($tabla) {
		$this->query = "";
		$this->comando1 = "SELECT ";
		$this->tabla = $tabla;
		return $this;	
	}

	/**
	 * Columnas que se van a requerir en la consulta
	 * @param  string $columnas Nombre de columnas separados por coma. Si es
	 *                          null se asume '*'
	 * @return Repositorio Se regresa a si misma para poder encadenar llamadas
	 */
	public function columnas($columnas = NULL) {
		
		if (!is_null($columnas)) {
			$this->filtroCol = $columnas;
			return $this;
		}
		$columas = '*';
		return $this;
	}

	/**
	 * Columna que se esta usando como parametro a filtrar en la clausula WHERE
	 * @param  string $columna Nombre de una columna en la tabla seeccionada
	 * @return Repositorio Se regresa a si misma para poder encadenar llamadas
	 */
	public function donde($columna) {
		$this->comparaWhere = $valor;
		return $this;
	}

	/**
	 * Valor a satisfacer en la igualdad WHERE $columna = 'valor'
	 * @param  string $filtroWhere Puede ser un numero, string o variable
	 * @return Repositorio Se regresa a si misma para poder encadenar llamadas
	 */
	public function igualA($filtroWhere) {
		$this->filtroWhere = $filtroWhere;
		return $this;
	}

	/**
	 * Funcion privada que concatena la consulta una vez se hayan satisfecho
	 * los comandos necesarios
	 * @return string Regresa una cadena con la sentencia SQL completa
	 */
	private function formaQuery() {
	// Formar query, regresar resultado
		$buffer = $this->comando1;  // SELECT, UPDATE, DELETE, INSERT
		$buffer .= $this->filtroCol; // * o lo que diga el usuario
		$buffer .= " FROM " . $this->tabla;
		$buffer .= " WHERE " . $this->comparaWhere . " = :" . $this->filtroWhere;
		//$buffer .= " LIMIT ". $this->limite . " OFFSET " . $this->offset
		$buffer .= ";";
		// Deberia dar: "SELECT usr, nombre, ap_paterno, ap_materno, sucursal FROM exp_admin where usr=:usr"
		$this->query = $buffer;
		return $buffer;
	}

	/**
	 * Ejecuta la sentencia SQL 
	 * @return array Devuelve un arreglo asociativo con los resultados
	 */
	public function ejecutar() {
		//echo "BOOM! Se ejecuto el query";
		//echo "<pre>".$this."</pre>";
		$resultado = $this->db->prepare($this->formaQuery());
		$resultado->execute(array( (":" . $this->filtroWhere ) => $this->comparaWhere ));
		return $resultado->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * Devuelve la consulta en texto plano que se tenga hasta el momento 
	 * @return string Consulta SQL formada
	 */
	public function __toString() {
		$this->formaQuery();
		$buffer =  "comando1:\t" . $this->comando1 . PHP_EOL;
		$buffer .= "filtroCol:\t" . $this->filtroCol . PHP_EOL; 
		$buffer .= "tabla:\t" . $this->tabla . PHP_EOL;
		$buffer .= "filtroWhere:\t" . $this->filtroWhere . PHP_EOL;
		$buffer .= "comparaWhere:\t" . $this->comparaWhere . PHP_EOL;	
		$buffer .= "query:\t" . $this->query . PHP_EOL;	
		return $buffer;
	}
}
