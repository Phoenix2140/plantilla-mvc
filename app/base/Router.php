<?php 

	/**
	 * Esta clase se utiliza para obtener el método de acceco
	 * a la página web y para "parsear" la ruta, para que sea
	 * más accesible para poder tratarla desde las rutas.
	 */
	class Router{
		/**
		 * Se declara la variable privada $method, que se 
		 * encargará de obtener el método de petición de la 
		 * aplicación web
		 */
		private $method;
		
		/**
		 * Constructor de la clase que al ser creada como objeto
		 * atumáticamente obtiene y guarda el método con el cual
		 * se hace la petición web.
		 */
		public function __construct(){
			$this->method = $_SERVER["REQUEST_METHOD"];
		}

		/**
		 * Se obtiene el método ya guardado
		 */
		public function get(){
			return $this->method;
		}

		/**
		 * Se parsea la Uri o dirección web parcial y se divide
		 * en datos más legibles
		 */
		public function enlace(){
			return explode('/', $path = empty($_SERVER['REQUEST_URI']) ? false : $_SERVER['REQUEST_URI']);
		}

	}

 ?>