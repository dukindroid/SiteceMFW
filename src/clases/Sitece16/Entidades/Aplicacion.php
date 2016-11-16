<?php
 /**
  * Clase Aplicacion.
  * 
  * La clase Aplicacion es el Wrapper final de la Libreria Sitete16. Funge como
  * Controlador Unico Frontal, interpreta los requests recibidos y devuelve la 
  * pagina apropiada de acuerdo a la clase Vista. Este archivo es parte de la
  * libreria Sitece/Sitece16.
  * 
  * @author Javier Gutiérrez Herrera
  * 
  * @todo implementar el .htacces y demas configuracion ncesaria para no cargar
  *       los modulos como "www.sitece.com/planbimestral/Index.htm?semHasta=28&
  *       semDesde=24&suc=3" sino como "sistematece.com/plan/mzo/24/28"  
  * 
  * @var array    $servicios  Arreglo que contiene Llave => Nombre del servicio
  * @var array $params  Arreglo con argumentos de inicializacion para servicios
  * @var Contenedor $deps       Acceso a clase de dependencia de servicios
  * @var Usuario    $usuario    Objeto referencia al usuario actual
  */
class Aplicacion 
{
    /** @var array Servicios ofrecidos por el Contenedor */
    public $servicios = array();
    /** @var array Parametros de los servicios en caso que requieran */
    public $parametros = array();
    /** @var Contenedor Dependencias es la instancia de la clase Contenedor */
    public $deps;
    /** @var Usuario Instancia del usuario que ha accesado el sistema */
    public $usuario;

    /**
     * Constructor de la clase Aplicacion
     * 
     * Inicializa los servicios y parametros del Contenedor y la instancia del
     * usuario. 
     * 
     * @return Aplicacion
     */
    public function __construct(){
         /** 
         * Lista de servicios proveidos por la intancia de Contenedor:
         *  Nomb. Corto     Clase           Descripcion
         *     db:          Database    Conexión a Base de Datos
         *     repo:        Repositorio Instancias de repositorio de usuarios
         *     log:         Monolog     Registro de eventos en txt
         *     vista:       Vistas      Instancias de Vistas 
         */
        $this->servicios = array( "db"          => "Database", 
                                  "log"         => "Monolog",
                                  "repo"        => "RepoUsuarios" );

        /**
         * Lista de parametros proveida a cada instancia creada en Contenedor
         * Database:    Nombre de la base de datos a cargar
         * Repositorio: Conexion al servidor MySQL
         * Monolog:     Nombre del canal de log a instanciar
         */
        $this->parametros = array( "Database"    => "sistemh4_principal",
                                   "Repositorio" => "db",
                                   "Monolog"     => "unico" );

        /** @var Contenedor Instancia de acceso a servicios comunes a todos los 
         *  objetos */
        $this->deps = new Contenedor($servicios, $parametros);

        /** @var repoUsuarios Repositorio de la clase Usuario */
        $repoUsuarios = new repoUsuarios($deps->db());

        // Si no se ha iniciado sesion, salir de la aplicacion.
        if (!isset($_SESSION['USR'])) {
            $this->deps->vista('default', null);
            $this->deps->vista('menus', null);
            exit;
        }

        /** @var Usuario Instancia del usuario conectado en este momento */
        $usuario = $repoUsuarios->encontrarUno($_SESSION['USR']);
        // Una vez instanciado el usuario, referimos sus permisos a las Vistas
        $deps->vista->auth($usuario);
    }

    /**
     * Despliega la representacion HTML de una clase 
     * 
     * 
     * @param  [type] $seccion [description]
     * @return [type]          [description]
     */
    public function render($seccion){
        $this->vista($seccion, $usuario);
    }
}

/**
 * Función de utilería para debug
 * 
 * Recibe cualquier cadena de texto y la despliega con formato.
 * 
 * @param string $buf La cadena que se va a imprimir en pantalla
 */
function d($buf) {
    printf("<pre>%s</pre>",print_r($buf, true));
}