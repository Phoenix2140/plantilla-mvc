# Plantilla Base MVC

Esta plantilla es el modelo básico de programación MVC(Modelo Vista Controlador),
la arquitectura sigue los patrones similares a los que muchos Frameworks utilizan hoy en día con funciones básicas para comenzar proyectos en PHP, aportando de manera sencilla la base para entender el MVC.

La estructura de directorios es esta:
  - app
    - base -> librerías base de la plantilla
    - config -> algunas configuraciones y cargadores
    - controllers -> controladores de la aplicación
    - models -> modelos de la aplicación
    - views -> vistas de la aplicación
  - public
    - css -> ojas de estilo
    - files -> archivosvarios
    - img -> imagenes
    - js -> javascript

La aplicación utiliza el modrewrite de apache para tener las url más amigables y se apunta a el directorio public para mayor seguridad, ocultando la lógica del exterior manteniendo solo acceso a este directorio (public), el cual se utiliza para tener los archivos de estilos, javascript entre otros publicamente.

### Instalación
Para instalarlo necesitas descargarlo o clonarlo desde [Github](https://github.com/Phoenix2140/plantilla-mvc), seguiremos los pasos de instalación desde linux (debian/ubuntu).

Lego necesitas configurar un VirtualHost en apache, editando por ejemplo  /etc/apache2/sites-available/mcv.dev.conf , siguiendo los pasos a consinuación:

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

### Comentarios
El código tiene varios comentarios para facilitar el entendimiento de este.