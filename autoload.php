<?php
/**
 * Autoload de clases de Sitece16.
 * 
 * Carga el namespace Sitece/Sitece16 e instancia las clases Contenedor y 
 * Usuario. Cumple con las recomendaciones del standard PSR-4 Este archivo es
 * parte de la libreria Sitece/Sitece16.
 * 
 * @author Javier Gutiérrez Herrera 
 * 
 * @param string $clase Nombre de la clase que se quiere instanciar
 */
spl_autoload_register(function ($clase) {
    // Prefijo del Proyecto
    $prefijo = 'Sitece\\Sitece16'

    // Directorio base de clases
    $dir_base = __DIR__ . '/clases/';

    // Es parte del namespace del proyecto?
    $len = strlen($prefijo);
    if(strncmp($prefijo, $clase, $len) !== 0) {
        // No es, entonces pasar al siguiente autoloader
        return;
    }

    // Obtener el nombre relativo de la clase
    $clase_relativa = substr($clase, $len);

    // Reemplazar prefijo con el directorio base
    $archivo = $dir_base . str_replace('\\', '/', $clase_relativa) . '.php';

    // Si el archivo existe, lo cargamos
    if (file_exists($archivo)) {
        require $file;
    }
});
