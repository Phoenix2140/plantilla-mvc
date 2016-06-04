<?php 
	/*
	* Se carga el soporte de base de datos básico
	* funciones generales que ayudarán al manejo de base
	* de datos, utiliza PDO que soporta varios tipos de 
	* Base de datos como (CUBRID, MS SQL Server, MySql, IBM,
	* Informix, Firebird, Oracle, ODBC, Postgree SQL, SQLite
	* y 4D)
	*/
	require($config->get('baseDir').'Database.php');

	/**
	 * En este archivo se llaman y se cargan las rutas
	 * de la aplicación web, se dividen por tipo GET y POST,
	 * pero se pueden agregar más como Delete por ejemplo.
	 *
	 * Cada vez que se hace una llamada, esta se filtra 
	 * por la ruta
	 */
	require($config->get('configDir').'route.php');

 ?>