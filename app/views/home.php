<h1><?php echo $mensaje; ?></h1>
<?php 
	foreach ($datos as $dato) { ?>
	<p><?php echo $dato["nombre"]; ?></p>	
<?php	} ?>
