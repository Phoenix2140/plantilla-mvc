# Plantilla Base MVC

Esta plantilla es el modelo básico de programación MVC(Modelo Vista Controlador),
la arquitectura sigue los patrones similares a los que muchos Frameworks utilizan hoy en día con funciones básicas para comenzar proyectos en PHP, aportando de manera sencilla la base para entender el MVC.

La estructura de directorios es esta:
  - app
    - base -> Librerías base de la plantilla
    - config -> Algunas configuraciones y cargadores
    - controllers -> controladores de la aplicación
    - models -> modelos de la aplicación
    - views -> vistas de la aplicación
  - public
    - css -> Hojas de estilo
    - files -> Archivos varios
    - img -> Imágenes
    - js -> JavaScript

La aplicación utiliza el modrewrite de apache para tener las url más amigables y se apunta a el directorio public para mayor seguridad, ocultando la lógica del exterior manteniendo solo acceso a este directorio (public), el cual se utiliza para tener los archivos de estilos, javascript entre otros publicamente.

### Instalación
Para instalarlo necesitas descargarlo o clonarlo desde [Github](https://github.com/Phoenix2140/plantilla-mvc), seguiremos los pasos de instalación desde linux (debian/ubuntu).

Luego necesitas configurar un VirtualHost en apache, editando por ejemplo  /etc/apache2/sites-available/mcv.dev.conf , siguiendo los pasos a consinuación:

```sh
<VirtualHost *:80>
        #nombre del host de la máquina virtual
        #Agregar la dirección "127.0.0.1  mvc.dev" en el archivo /etc/hosts
        #o realizar la configuración como deseen
        ServerName mvc.dev

        ServerAdmin webmaster@localhost
        #Document Root y Directory deben apuntar con la dirección total a la 
        #carpeta public dentro de mvc
        DocumentRoot /var/www/html/mvc/public
        <Directory /var/www/html/mvc/public>
                Allow from all
                Order allow,deny
                Options Indexes Multiviews FollowSymLinks
                AllowOverride ALL
        </Directory>
</VirtualHost>
```
Luego como Root activamos el módulo modrewrite y la página
```sh
$ a2enmod rewrite
$ a2ensite mcv.dev.conf
$ service apache2 restart
```

### La base de datos
La base de datos de ejemplo es la siguiente:
```sh
-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2016 a las 20:57:30
-- Versión del servidor: 5.5.49-0+deb8u1
-- Versión de PHP: 5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tabla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE IF NOT EXISTS `tabla` (
`id` int(11) NOT NULL,
  `nombre` varchar(55) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tabla`
--

INSERT INTO `tabla` (`id`, `nombre`) VALUES
(1, 'hola'),
(2, 'mundo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla`
--
ALTER TABLE `tabla`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla`
--
ALTER TABLE `tabla`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```

### Comentarios
El código tiene varios comentarios para facilitar el entendimiento de este.
Para cualquier consulta o comentario escribir a [hector.alvarez@linux.com](mailto:hector.alvarez@linux.com)
Ejemplo desarrollado por Héctor Álvarez.
