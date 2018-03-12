# Gestión FCT

Aplicación web para la gestión FCT de módulos.

Aplicación de PHP con Symfony 4.0.

## Requisitos

* PHP 7.1.3 o superior.
* Servidor web Apache2 o Nginx.
* Sistema de gestión de Base de Datos compatible con Doctrine.
* Composer.
* npm/yarn.

### Desarrollado con

* Symfony 4.0
* Twig
* Composer
* Yarn/npm
* Webpack (Webpack Encore)
* jQuery
* Bootstrap
* SASS (SCSS)
* Font Awesome 5

### Instalación

Para instalar las dependencias tendremos que seguir los siguientes pasos en la carpeta del proyecto:

* Para las dependencias de PHP: ``` composer install ```
* Para las dependencias de JS: ``` yarn (o npm) install ```
* Para compilar los assets: ```yarn (o npm) run dev```

* Configuramos nuestro archivo ```.env``` con nuestros datos.

* Creamos la Base de Datos:

```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

* (Opcional) Y, una vez creada la Base de Datos, iniciamos la carga de datos (la primera vez):

```php bin/console doctrine:fixtures:load```

* Cuenta admin:
```
usuario: admin
contraseña: admin
```
## Autores

* **Cristian Rodríguez Ruiz** - [Github](https://github.com/cristianrod)

## Licencia

Este proyecto está licenciado bajo la licencia GNU AGPLv3 - más información en el fichero [LICENSE.md](LICENSE.md).
