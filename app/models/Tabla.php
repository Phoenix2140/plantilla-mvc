<?php 
	/**
	 * Clase Model Tabla, el modelo se conecta a la base de datos
	 * y realiza una query básica
	 */
	class Tabla{
		private $db;

		/**
		 * El constructor del Modelo realiza una llamada
		 * a la clase Database para obtener el soporte para 
		 * realizar las consultas a esta
		 */
		public function __construct($config){
			$this->db = new Database($config);
		}

		/**
		 * Función básica que obtiene las filas de la tabla
		 * tabla de la base de datos "Tabla"
		 */
		public function getTabla(){
			$this->db->query("SELECT * FROM tabla");

			return $this->db->resultSet();
		}
	}
 ?>