<?php 
	/**
	 * Controlador de ejemplo Home llamado desde las rutas
	 * Solo hace uso básico de las vistas y un acceso 
	 * simple a base de datos
	 */
	class Home{
		private $config;
		private $view;

		/**
		 * Constructor del controlador que recibe como
		 * parámetro la configuración
		 */
		public function __construct($config){
			/**
			 * Asigna la configuración recibida en la variable 
			 * privada $config
			 */
			$this->config = $config;

			/**
			 * Carga la clase template y se crea un objeto tipo template
			 * para trabajar con las vistas
			 */
			require_once($this->config->get('baseDir').'Template.php');
			$this->view = new Template();
		}

		public function indexAction(){

			/**
			 * Se crea un objeto del modelo Tabla 
			 * (la cual accede a base de datos), luego se realiza 
			 * una consulta a la base de datos obteniendo todos
			 * los valores de la tabla y se asignan a las variables de
			 * la vista
			 */
			require($this->config->get('modelsDir').'Tabla.php');
			$tabla = new Tabla($this->config);
			$this->view->datos = $tabla->getTabla();
			
			/**
			 * Se crean variables (titulo y mensaje) en la vista.
			 */
			$this->view->titulo = "Hola Ejemplo";
			$this->view->mensaje = "Hola Mundo";

			/**
			 * Se crea una variable (especial) que contiene una vista
			 * views/home.php, con los valores deseados
			 */
			$this->view->content = $this->view->render($this->config->get('viewsDir').'home.php');

			/**
			 * Luego se genera y junta toda la vista en 
			 * la "vista padre" views/header.php, esta vista contiene
			 * en su interior todas las variables creadas anteriormente
			 * incluso la vista parcial home.php
			 */
			echo $this->view->render($this->config->get('viewsDir').'header.php');


		}
	}
 ?>