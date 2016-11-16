<?php 
// código que ya no se usó
// 
// 
/**
 * Contenedor de dependencias
 *
 * Instancia de la clase Contenedor. Se inicializa con los servicios comunes a
 * todas las clases arriba mencionados
 *
 * @todo Generalizar la clase Repositorio para que pueda instanciar el reposito-
 *       rio de cualquier entidad 
 */ 

/*
class RepoUsuarios implements Repositorio {
	public function miRepositorio();
}

// Toda entidad Persistible debe de cargarse de su respectivo repositorio
class RepoPermisos implements Repositorio {
	private 
	public function miRepositorio();
}

abstract class Fabricador 
{
	protected abstract function metodoPara(Persistible $entidad);

	public function fabricar($unPersistible) {
		$estePersistible = $unPersistible;
		$entidad = $metodoPara($estePersistible);
		return $entidad;
	}
}

// Repositorio de usuarios
class RepoUsuarios extends Fabricador 
{
	protected function metodoPara
}

class App 
{
	private $miUsuario;
	private $repoRepos;

	public function __construct() {
		$this->repoRepos = new RepoRepos();
		$miUsuario = $this->repoRepos->fabricar(new Usuario())
	}

}

$trabajo = new app()

*/
?> 
          <!-- search form -->
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
<?php
/*
	public function db() {
		// Conexion de la base de datos
		if (empty($this->_instancias['db'])	|| !is_a($this->_instancias['db'], 'PDO'))
			$this->_instancias['db'] = new Database();
		return $this->_instancias['db'];
	}

	public function repositorio() {
		// Objeto PDO para acceso basico CRUD a la base de datos
		if (empty($this->_instancias['repo'])	|| !is_a($this->_instancias['repo'], 'Repositorio')) {
			$this->_instancias['repo'] = new Repositorio($this->db());
		}
		return $this->_instancias['repo'];
	}

	public function log(){
		// Guarda detalles sobre cada acceso
	}

	public function vista(){
		// Carga un html para menus, layouts, .. vistas..
		
	}
	*/
// Autoloader viejito
/*class Autoloader {
    static public function loader($className) {
        $buf = str_replace('\\', '/', $className);
        $filename = "./modulo/PlanBimestral/Clases/" . $buf . ".php";

        if (file_exists($filename)) {
            //printf("<pre>Si existe el archivo: %s, </pre>",print_r($filename, true));
            include($filename);
            if (class_exists($className)) {
                //printf("<pre>Se cargó la clase %s</pre>",print_r($className, true));
                return TRUE;
            }
        } 
        //printf("<pre>No existe la clase: %s</pre>",print_r($className, true));
        return FALSE;
    }
}
spl_autoload_register('Autoloader::loader');
*/


//	public function limite($lim) {
//
//		return $this;
//	}
/**
 * 
// TODO Abstraer proceso de: info(beginTx, prepare, exec, fetch) -- db.select(usr)?	
if ($consulta->execute(array(":usr"=>$cual))) {
	$info = $consulta->fetch(PDO::FETCH_ASSOC);
	//printf("<pre>Cons1 %s</pre>",print_r($info, true));
}
$consulta = $this->db->prepare("SELECT tipo_usuario FROM seguridad where usr=:usr");
if ($consulta->execute(array(":usr"=>$cual))) {
	$info = $info + $consulta->fetch(PDO::FETCH_ASSOC);
	//printf("<pre>Cons2 %s</pre>",print_r($info, true));
}
return new Usuario($info);
*/