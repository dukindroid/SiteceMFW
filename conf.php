<?php
/*
*Archivo de configuracion para nuestra aplicacion modularizada
*Definimos calores por defecto y datos para cada uno de nuestros modulos
*/
define('MODULO_DEFECTO','home');
define('LAYOUT_DEFECTO','plantilla.php');
define('MODULO_PATH',realpath('./modulo/'));
define('LAYOUT_PATH',realpath('./layout/'));
$conf['home'] = array(
				'archivo' => 'home.php',
				'layout' => LAYOUT_DEFECTO);
$conf['documentos'] = array('archivo'=>'documentos.php');
$conf['newaspirante'] = array('archivo'=>'newaspirante.php');
$conf['mis_aspi'] = array('archivo'=>'misaspirantes.php');
$conf['detalles'] = array('archivo'=>'detalles.php');
$conf['inscribir'] = array('archivo'=>'inscripcion/index.php');
$conf['preventa'] = array('archivo'=>'preventa.php');
$conf['reg_semanal'] = array('archivo'=>'metas/registro_semanal/controller.php');
$conf['pb'] = array('archivo'=>'app.php');
$conf['rol_admin'] =  array('archivo'=>'app.php');

/*$conf['sucursal'] =  array('archivo' => 'sucursales.php');
$conf['empleados'] = array('archivo' => 'empleados.php');
$conf['login'] = array('archivo'=>'login.php');
$conf{'admin'} = array('archivo'=>'admin.php');
$conf['terminar'] = array('archivo'=>'terminar.php');
$conf['usuarios'] = array('archivo'=>'usuarios.php');
$conf['nomina']=array('archivo'=>'nominas.php');
$conf['cambiarpass']=array('archivo'=>'changepass.php');
$conf['asistencia']=array('archivo'=>'asistencia.php');*/
//$conf['altainforme']=array('archivo'=>'altainforme.php');
//$conf['reportes']=array('archivo'=>'reportes.php');
//$conf['imp_art'] = array(
//				'archivo' => $conf['articulo']['archivo'],
//				'layout' => 'imprimir.php');

?>