<?php 
	/**
	 * Clase que de dedica a la gestión de la base de datos,
	 * Utiliza el Driver PDO, el cual tiene soporte para
	 * varios tipos de base de datos, en caso de cambiar
	 * de una base de dato a otra solo se cambia el driver
	 * a la base de datos deseada y la implementación 
	 * viariará poco
	 */
	Class Database{
	 
	 	/**
	 	 * Se declaran las variables privadas necesarias para
	 	 * la configuración de la base de datos.
	 	 */
	    private $dbh;
	    private $error;
	    private $stmt;
	 
	 	/*
	 	* Constructor de la clase, 
	 	* se llama automáticamente al crear un objeto clase
	 	* conectandose automáticamente al servidor quedando
	 	* preparada para la consulta a base de datos.
	 	*/
	    public function __construct($config){
	        // Set DSN
	        $dsn = $config->get('adapter').':host=' . $config->get('host') . ';dbname=' . $config->get('dbname');
	        // Set options
	        $options = array(
	            PDO::ATTR_PERSISTENT    => true,
	            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
	        );
	        // Create a new PDO instanace
	        try{
	            $this->dbh = new PDO($dsn, $config->get('username'), $config->get('password'), $options);
	        }
	        // Catch any errors
	        catch(PDOException $e){
	            $this->error = $e->getMessage();
	        }
	    }
		
		/**
		 * Función encargada de hacer las consultas a la base 
		 * de datos (INSERT, UPDATE, SELECT, ETC).
		 */
		public function query($query){
			$this->stmt = $this->dbh->prepare($query);
		}

		/**
		 * bind se ocupa de "escapar" y comprobar los valores
		 * que se envían a la base de datos para prevenir los
		 * sqlInjection (seguridad)
		 */
		public function bind($param, $value, $type = null){
			if (is_null($type)) {
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
						break;
				}
			}
			$this->stmt->bindValue($param, $value, $type);
		}

		/**
		 * Execute es la función que se encarga de hacer
		 * "correr" las queries una vez preparadas por la
		 * función query()
		 */
		public function execute(){
			return $this->stmt->execute();
		}

		/**
		 * Devuelve la lista de todos los valores consultados
		 * útil cuando se necesiten múltiples filas
		 */
		public function resultSet(){
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		/**
		 * Single obtiene solo una fila de la query y 
		 * la transforma en array
		 */
		public function single(){
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_ASSOC);
		}

		/**
		 * Función que cuenta las filas de una consulta
		 */
		public function rowCount(){
			return $this->stmt->rowCount();
		}

		/**
		 * Función que devuelve la última query insertada,
		 * útil cuando necesitemos la ID del elemento que 
		 * recién insertamos den la DDBB
		 */
		public function lastInsertId(){
			return $this->dbh->lastInsertId();
		}

		/**
		 * Función que comienza una transacción, 
		 * útil cuando necesitemos insertar o 
		 * hacer múltiples consultas a la base de datos
		 */
		public function beginTransaction(){
			return $this->dbh->beginTransaction();
		}

		/**
		 * Función que termina la transacción, posterior
		 * llamar a la función execute(), lo cual
		 * realizará todas las consultas de la transacción
		 */
		public function endTransaction(){
			return $this->dbh->commit();
		}

		/**
		 * Cancela la transacción
		 */
		public function cancelTransaction(){
			return $this->dbh->rollBack();
		}

		/**
		 * Función para debuggear las consultas 
		 * a base de datos
		 */
		public function debugDumpParams(){
			return $this->dbh->debugDumpParams();
		}


	}
 ?>