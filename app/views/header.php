<!-- Vista básica, las vistan deben tener el mínimo de php o nulo
Solo se utilizan para mostrar la información procesada por los
controladores. 
Recibe los datos del controlador Home y rendereados por
la Clase Template
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
</head>
<body>
	<?php echo $content; ?>
</body>
</html>