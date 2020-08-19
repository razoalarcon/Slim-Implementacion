# Slim4 Implementation with Bulma V1.0

Esta es una implementación de Api REST con el mini-framework de php Slim4 para recuperar información de una Base de Datos "Farmacia" y poder representarlos con vistas en Bulma Framework CSS.

# Pre-requisitos

Framework Slim

Xampp 

Postman

Composer

# Estructura del proyecto 📁

```bash
Farmacia //Carpeta principal del proyecto
|----public
|----|--assets
|    |  |--js
|    |     |--index.js
|    |----.htaccess
|    |-----index.php
|----src    
|    |----config 
|    |  |---db.php
|    |  |---config.php
|    |----templates
|    |  |---farmacia_d.php
|    |  |---farmacias.php
|    |  |---home.php
|    |  |---producto.php
|----vendor
|----farmcia.sql
```

# Configurando el Virtual Host 💻

*Nota: La carpeta del proyecto "Farmacia" la pegamos en la carpeta "htdocs" de la carpeta Xampp.*

## 1.- Habilitar el Mod_Rewrite en Apache para el .htaccess en el archivo "*httpd"*

```bash
C:\xampp\apache\conf\httpd                         //Ruta
```

## 2.- Agregamos el Virtual Host

```bash
C:\XAMPP\apache\conf\extra\httpd-vhosts.conf        //Ruta       

<VirtualHost *:80>
    ServerAdmin webmaster@myfarm.com                //Asigamos nombre al dominio
    DocumentRoot "C:/xampp/htdocs/Farmacia/public"  //Accedemos a la carpeta principal
    ServerName myfarm.com 
    ErrorLog "myfarm.com-error.log"
    CustomLog "myfarm.com-access.log" common
</VirtualHost>
```

## 3.- Apuntamos el dominio a la IP

```bash
C:\Windows\System32\drivers\etc\hosts

127.0.0.1      myfarm.com
```

# Endpoints ✏️

[Nota: En los detalles el {id} va dentro del Query]
| Ruta          | Metodo        | Tipo          | Ruta completa | Descripccion  | 
| ------------- | ------------- | ------------- | ------------- | ------------- |
| /               | GET  | VIEW | http://myfarm.com/ | Home |
| /farmacias/tipo/farmatodo  | GET  | VIEW | http://myfarm.com/farmacias/tipo/farmatodo | Todas las farmacias con Vista Css|
| /api/farmacias  | GET  | JSON | http://myfarm.com/api/farmacias | Todas las farmacias |
| /api/detalle    | GET  | JSON | http://myfarm.com/api/detalle | Detalle farmacia |

# Despliegue 📦

Accedemos al **Xampp-control** y encendemos el servidor **Apache** y **MySql** despues de eso ya podemos acceder a los Endpoints desde el navegador.

# Dependencias y Librerías Usadas 🛠️

- [Slim]( http://www.slimframework.com/docs/v4/)
Framework Php
- [Bulma](https://bulma.io/documentation/)
Framework CSS 
- [Axios](https://github.com/axios/axios) 
Cliente Http para JS
- [Php-View](https://github.com/slimphp/PHP-View) Para las vistas
- [Respect\Validation](https://respect-validation.readthedocs.io/en/2.0/)
- [PSR-7](https://github.com/slimphp/Slim-Psr7) (Interfaces de mensaje  Http)

# Wiki 📖

<strong>Puedes encontrar como configurar un Virtual Host de manera detallada en mi video </strong>

[https://www.youtube.com/watch?v=7YeY9EUtz0E](https://www.youtube.com/watch?v=7YeY9EUtz0E)

# Autor ✒️

- Miguel Alarcon

