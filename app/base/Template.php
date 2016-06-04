<?php 
	/**
	 * La clase Template se utiliza para crear soporte 
	 * básico a plantillas
	 */
	class Template{
		private $vars = array();

		/**
		 * Función que obtiene la variable que hemos creado
		 */
		public function __get($name){
			return $this->vars[$name];
		}

		/**
		 * Esta función crea una variable y la asigna a el arreglo
		 * $vars, la cual la podemos consultar mas tarde con __get
		 */
		public function __set($name, $value){
			if($name == 'view_template_file'){
				throw new Exception("Cannot bind variable named 'view_template_file'", 1);
				
			}
			$this->vars[$name] = $value;
		}

		/**
		 * Esta función "genera" la vista que deseemos del directorio views,
		 * puede asignarse a una variable con set.
		 */
		public function render($view_template_file) {
			/**
			 * Si no existe la vista, muestra el mensaje de error
			 */
			if(array_key_exists('view_template_file', $this->vars)) {
				throw new Exception("Cannot bind variable called 'view_template_file'");
			}
			
			/**
			 * Todas las variables son importadas a la vista actual,
			 * la vista o vistas anidadas son guardadas en un bufer,
			 * luego de procesarlas se muestra la vista "compilada"
			 */
			extract($this->vars); 
			ob_start(); 
			include($view_template_file); 
			return ob_get_clean();
		}
	}
 ?>