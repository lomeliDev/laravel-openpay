# LaravelOpenPay

[![N|Solid](https://lomeli.io/assets/img/logo.png)](https://lomeli.io)

## Introducción

LaravelOpenPay provee una interfaz sencilla para utilizar el sdk de openpay en proyectos que tienen como base el framework [*Laravel*](https://laravel.

## Instalación y configuración

Instalar el paquete mediante composer:

```bash
composer require toopago/laravel-openpay
```

Luego incluir el ServiceProvider en el arreglo de providers en _config/app.php_

```bash
TooPago\Payu\LaravelServiceProvider::class,
```

Publicar la configuración para incluir la informacion de la cuenta de OpenPay:

```bash
php artisan vendor:publish
```

Incluir la informacion de la cuenta y ajustes en el archivo _.env_ ó directamente en
el archivo de configuración _config/openpay.php_

```bash
OPENPAY_ID=xxxxxxxxxxxxxxxx
OPENPAY_SK=xxxxxxxxxxxxxxxx
OPENPAY_PK=xxxxxxxxxxxxxxxx
OPENPAY_ENVIROMENT=https://sandbox-api.openpay.mx/v1/
OPENPAY_PRODUCTION_MODE=false

```

## Uso del API

Esta versión contiene solo una interfaz para pagos únicos y consultas.
Si necesita usar tokenización y pagos recurrentes debe usar el sdk directamente.

## Errores y contribuciones

Para un error escribir directamente el problema en github issues o enviarlo
al correo miguel@lomeli.io. Si desea contribuir con el proyecto por favor enviar los ajustes siguiendo la guía de contribuciones:

- Usar las recomendaciones de estilos [psr-1](http://www.php-fig.org/psr/psr-1/) y [psr-2](http://www.php-fig.org/psr/psr-2/)

- Preferiblemente escribir código que favorezca el uso de Laravel

- Escribir las pruebas y revisar el código antes de hacer un pull request
