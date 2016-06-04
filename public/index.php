<?php
/**
 * Este es el archivo index principal
 * carga las configuraciones, y librerías base
 * Desarrollado por:
 *      Héctor Álvares Díaz
 * Bajo Licencia GPL
 */

error_reporting(E_ALL); // Activa todos los reporte de errores

/**
 * Definimos el directorio anterior como el directorio de la aplicación (PHP)
 * ya que el actual directorio "public" solo es para archivos 
 * publicos (css, js, imagenes, archivos de front-end)
 */
define('APP_PATH', realpath('..')); 

//En caso de cualquier error durante la carga se mostrará
try {

    /**
     * Se carga el archivo principal de configuraciones
     * este archivo contiene los driver de base de datos, 
     * usuarios y direcciones de directorio para acceder más 
     * facilmente.
     */
    $config = include APP_PATH . "/app/config/config.php";
    

    /**
     * Desde acá se cargan y ejecutan librerías básicas 
     * como soporte a base de datos y el archivo de rutas
     * para la gestión de url's amigables (ayudan al SEO).
     */
    include APP_PATH . "/app/config/loader.php";


} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
