<?php
/**
 * 
 * 	// TODO: Catálogo
	// Cargar el catalogo
	// $catalogo = new Catalogo();

	// TODO: Fábrica de Gastos
	// $repoGastos = new repoGastos($dependencias);
	// TODO: Entidad de Gastos para cierto bimestre
	// $gastoReal = new repogastos->bimestre($cual, $quien = $miUsuario);
	// TODO: Fábrica de GastosProyectados
	// $repoGastosProyectados = new repoGastosProyectados($dependencias);
	// TODO: Entidad de GastosProyectados para cierta sucursal
	// gastoProyectado = $repoGastosProyectados($quien);

	$dependencias->vista('PB', $miUsuario->accesoMods());

	//d(get_declared_classes());

 * RBAC es la clase que maneja los roles y permisos de acceso de los usuarios a cada seccion
 * del sistema
 * 
 * Declara las siguientes sub clases:
 * 		Roles:  ROOT ADMINISTRA GERENTE DIRECTOR CONTADOR FINANCIERO COOFINAN JURIDICO ACADEMICA
 *   			CARRERA COORDINADOR COOVENTAS MODULISTA PROFESOR PROMOTOR SEP RH COMWEB SECRETARIA 
 *      		PUBLICIDAD CAMISAS INTENDENCIA ALUMNO SUPERVISOR
 *   	Permisos: Cada rol tiene permisos diferentes de acceso a cada uno de los modulos.
 *    			  Cada módulo debe declarar que accesos va a conceder a cada rol.
 *         		  
 *             	  El módulo PB cuenta con los siguientes permisos:
 *                ver_PB_global
 *                ver_PB_regional
 *                ver_PB_local
 *  
 *                crear_gasto_proyectado
 *                leer_gasto_proyectado
 *                editar_gasto_proyectado
 *                borrar_gasto_proyectado
 * 
 *                crear_gasto
 *                leer_gasto
 *                editar_gasto
 *                borrar_gasto
 *  
 *      Para el módulo PB los siguientes roles cuentan con el permiso para:
 *                ROOT: Todos
 *                ADMINISTRA : Todos
 *                SUPERVISOR: Todos menos ver_PB_global
 *                GERENTE: Todos menos ver_PB_global y ver_PB_regional
 *                FINANCIERO: ver_PB_local, leer_gasto_proyectado, crear_gasto, leer_gasto              
 */
 
/**
 * Estos son todos los roles que existen actualmente:
 * 
 * ROOT
 * ADMINISTRA
 * GERENTE
 * DIRECTOR
 * CONTADOR
 * FINANCIERO
 * COOFINAN
 * JURIDICO
 * ACADEMICA
 * CARRERA
 * COORDINADOR
 * COOVENTAS
 * MODULISTA
 * PROFESOR
 * PROMOTOR
 * SEP
 * RH
 * COMWEB
 * SECRETARIA
 * PUBLICIDAD
 * CAMISAS
 * INTENDENCIA
 * ALUMNO
 * Array
 * 
 * Por lo pronto vamos a usar un esquema simplificado
 * 
 * ID
 * 1   ROOT - tiene todo el acceso
 * 2   ADMINISTRA - puede agregar y quitar GastosProyectados
 * 3   FINANCIERO - puede agregar y quitar Gastos
 * 4   COOFINAN - puede agregar Gastos
 * 5   COORDINADOR - no puede hacer nada 
 */

/**
 * Por el momento existen los siguientes permisos:
 *  id	titulo
 * 	2	ver_PB_global
 *	3	ver_PB_regional
 *	4	ver_PB_local
 *	5	crear_gasto_proyectado
 *	6	leer_gasto_proyectado
 *	7	editar_gasto_proyectado
 *	8	borrar_gasto_proyectado
 *	9	crear_gasto
 *	10	leer_gasto
 *	11 	editar_gasto
 *	12 	borrar_gasto
 *	13	ver_RBAC
*/

/**
 * Declaraciones iniciales de permisos por rol
 * 
*/
('1', '2', NOW()), 
(NULL, '1', '3', NOW()),
(NULL, '1', '4', NOW()), 
(NULL, '1', '5', NOW()),
(NULL, '1', '6', NOW()), 
(NULL, '1', '7', NOW()),
(NULL, '1', '4', NOW()), 
(NULL, '1', '5', NOW()),
(NULL, '1', '6', NOW()), 
(NULL, '1', '7', NOW()),
(NULL, '1', '8', NOW()), 
(NULL, '1', '9', NOW()),
(NULL, '1', '10', NOW()), 
(NULL, '1', '11', NOW()),
(NULL, '1', '12', NOW()), 
(NULL, '2', '2', NOW()),
(NULL, '2', '3', NOW()),
(NULL, '2', '4', NOW()),
(NULL, '2', '5', NOW()),
(NULL, '2', '6', NOW()),
(NULL, '2', '7', NOW()),
(NULL, '2', '4', NOW()),
(NULL, '2', '5', NOW()),
(NULL, '2', '6', NOW()),
(NULL, '2', '7', NOW()),
(NULL, '2', '8', NOW()),
(NULL, '2', '9', NOW()),
(NULL, '2', '10', NOW()),
(NULL, '2', '11', NOW()),
(NULL, '2', '12', NOW()),
(NULL, '3', '3', NOW()),
(NULL, '3', '4', NOW()),
(NULL, '3', '5', NOW()),
(NULL, '3', '6', NOW()),
(NULL, '3', '7', NOW()),
(NULL, '3', '4', NOW()),
(NULL, '3', '5', NOW()),
(NULL, '3', '6', NOW()),
(NULL, '3', '7', NOW()),
(NULL, '3', '8', NOW()),
(NULL, '3', '9', NOW()),
(NULL, '3', '10', NOW()),
(NULL, '3', '11', NOW()),
(NULL, '3', '12', NOW()),
(NULL, '4', '4', NOW()),
(NULL, '4', '5', NOW()),
(NULL, '4', '6', NOW()),
(NULL, '4', '7', NOW()),
(NULL, '4', '4', NOW()),
(NULL, '4', '5', NOW()),
(NULL, '4', '6', NOW()),
(NULL, '4', '7', NOW()),
(NULL, '4', '8', NOW()),
(NULL, '4', '9', NOW()),
(NULL, '4', '10', NOW()),
(NULL, '4', '11', NOW()),
(NULL, '4', '12', NOW()),
(NULL, '5', '4', NOW()),
(NULL, '5', '6', NOW()),
(NULL, '5', '9', NOW()),
(NULL, '5', '10', NOW());