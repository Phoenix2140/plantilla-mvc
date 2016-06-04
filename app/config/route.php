<?php 
	/**
	 * Se llama a la clase Router para tratar las rutas
	 * y el tipo de Método que utiliza (POST, GET u otro)
	 */
	require_once($config->get('baseDir').'Router.php');
	$ruta = new Router();

	
	/**
	 * Se separan las rutas por los métodos GET y POST
	 * que son los métodos más utilizados, se pueden 
	 * incorporar otros según se requiera.
	 */
	if($ruta->get() == 'GET'){

		/**
		 * Se obtiene el enlace de la dirección web y se divide
		 * para poder tratarlas con un switch.
		 *
		 * Por ejemplo si la ruta es http://aplicacion.com/inicio
		 * el post procesado de ruta lo dejaría así:
		 * $enlace[0] = '';
		 * $enlace[1] = 'inicio';
		 *
		 * La ruta raíz de la página por defecto es vacía ''.
		 *
		 * Puedes anidar switches en caso que la ruta tenga 
		 * subdirectorios, por ejemplo http://aplicacion.com/usuario/3
		 * $enlace[0] = "";
		 * $enlace[1] = "usuario";
		 * $enlace[2] = "3";
		 */
		$enlace = $ruta->enlace();

		/**
		 * El Switch utiliza una accion dependiendo de la ruta.
		 */
		switch ($enlace[1]){
			case '':
				/**
				 * Se llama y se crea un objeto de la clase Home 
				 * para este ejemplo
				 */
				require_once($config->get('controllersDir').'Home.php');
				$home = new Home($config);

				/**
				 * Se llama y retorna la función indexAction() de la clase
				 * Home
				 */
				return $home->indexAction();
				break; // Se finaliza el switch
			/**
			 * Si la direción es /hola, se hace un echo con hola y
			 * se termina el switch
			 */
			case 'hola': 
				echo "hola";
				break;
			
			default:
				# code...
				break;
		}

	}elseif($ruta->get() == 'POST'){
		/**
		 * No está implementado, pero es similar a los pasos del
		 * Método GET con el switch
		 */
	}else{
		/**
		 * Pueden agregarse más Métodos
		 */
		echo "Nothing";
	}
 ?>