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

		/**
		 * Función que utiliza bind y execute para insertar un
		 * nuevo registro a la base de datos
		 */
		public function createTabla($nombre){
			$this->db->query("INSERT INTO tabla (nombre)
				VALUES (:nombre)");

			$this->db->bind(':nombre', $nombre);

			$this->db->execute();
		}

		/**
		 * Función que actualiza el nombre en la tabla por
		 * su id utilizando bind y execute de la clase Database
		 *
		 */
		public function updateTabla($id, $nombre){
			$this->db->query("UPDATE tabla SET nombre=:nombre
				WHERE id=:id");

			/**
			 * La función Bind de la clase Database se 
			 * encarga de vincular una variable al signo del
			 * sql, luego en execute se evalua todo y se realiza
			 * la query ya preparada.
			 */
			$this->db->bind(':id', $id);
			$this->db->bind(':nombre', $nombre);

			$this->db->execute();
		}
	}
 ?>
