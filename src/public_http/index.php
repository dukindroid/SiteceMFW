<?php
	session_start();
        
	if(!isset($_SESSION['bandera'])) $_SESSION['bandera']=0;
	date_default_timezone_set('America/Mexico_City');	
	//mandamos llamas las funciones de java script
	/*echo "<script type='text/javascript' src='./librerias/jquery-1.3.2.min.js'></script>";
	echo "<script type='text/javascript' src='./librerias/plugin/backgroundPosition.js'></script>";
	echo "<script type='text/javascript' src='./librerias/javascripts.js'></script>";*/
	
	error_reporting(E_ALL);
	// Primero incluiremos el arcchivo de configuracion
	include('conf.php');
	
	/*
	*Verificamos que se haya escogido un modulo sino
	*tomamos el valor por defecto de la configuracion
	*Tambien debemos verificar que el valor que nos 
	*pasaron corresponde a un modulo que existe
	*/

	if(!empty($_GET['mod'])){
		/*if($_GET['mod']=="login" || $_SESSION['bandera']==1)
			$modulo=$_GET['mod'];
		else
			$modulo=MODULO_DEFECTO;*/
                $modulo=$_GET['mod'];
	}else{
		$_SESSION['bandera']=0;
		$modulo=MODULO_DEFECTO;
	}	
	
	
	/*
	* Tambien debemos verificar que el valor que nos 
	* pasaron correspondea un modulo que existe, caso
	* contrario cargamos el modulo por defecto
	*/
	if (empty($conf[$modulo]))
		$modulo = MODULO_DEFECTO;
		
	/*
	* Ahora determinamos qeu archivo de Layout tendra
	* este modulo, si no tiene ninguno asignado, utilizamos
	* el que bieno por defecto
	*/
	if(empty($conf[$modulo]['layout']))
		$conf[$modulo]['layout'] = LAYOUT_DEFECTO;
		
	/*
	* Aqui podemos colocar todos los comandos necesarios para
	* realizar las tareas que se deben repetir en cada recarga
	*del index.php - en ejemplo a la conexion a la base de datos
	*/
    include('./clases/dbconectar.php');
	include('./clases/ConexionMySQL.php');
	include('./includes/funciones.php');
	/**
	 * Autoload de clases de Sitece16.
	 * 
	 * Carga el namespace Sitece/Sitece16 e instancia las clases Contenedor y 
	 * Usuario.
	 * 
	 * @author Javier Gutiérrez Herrera 
	 */
	require_once('autoload.php');
	/** @var Aplicacion Instancia del controlador frontal  */
	$app = new Aplicacion();

	//require('./fpdf/fpdf.php');
	//$db = new DB_mysql();
	//$db -> conectar($Base,$servidor,$usuario,$contrasena);
	//$func = new funciones();	
	
        /*Obtenemos las variables y funciones globales*/
        //este varable es para obtener la foto del usuario que esta conectado
        $img = (file_exists("../../Fotos/".$_SESSION["USR"].".jpg"))? "../Fotos/".$_SESSION["USR"].".jpg":"../Fotos/sinfoto.jpg";
        $mod = isset($_GET["mod"])? $_GET["mod"]:"home";
	
	/*
	* Finalmente cargaresmos el archivo de Layout que a su vez, se
	* encargara de incluir al modulo apropiadamente dicho, si el archivo
	* no existiera cargamos directamente al modulo. Tambien es un 
	* buen lugar para uncluis Headers y Footers comunes
	*/	
		$path_layout = LAYOUT_PATH.'/'.$conf[$modulo]['layout'];
		$path_modulo = MODULO_PATH.'/'.$conf[$modulo]['archivo'];


			
		if(file_exists($path_layout))
			include($path_layout);
		else
			if(file_exists($path_modulo)){
				include($path_modulo);
                        }else{
				die ('Error el cargar el modulo <b>'.$modulo.'</b> no existe el archivo <b>'.$conf[$modulo]['archivo'].'</b>');
                        }
	
