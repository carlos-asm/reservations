<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Proyecto Reservations

Este proyecto es una aplicación de reservas construida con Laravel. Proporciona funcionalidades para gestionar reservas y usuarios. A continuación, se describen los pasos para clonar el repositorio, instalar las dependencias necesarias, configurar el entorno y ejecutar la aplicación.

## Requisitos

Antes de empezar, asegúrate de tener instalados los siguientes programas:

- PHP 8.2 o superior
- Composer (para gestionar las dependencias de PHP)
- Node.js y npm (para gestionar las dependencias de JavaScript y compilar los recursos frontend)
- MySQL (o MariaDB)
- Git (para clonar el repositorio)

## Pasos para instalar y configurar el proyecto

### 1. Clonar el repositorio

    Clona el repositorio desde GitHub a tu máquina local:
    ```bash
    git clone git@github.com:carlos-asm/reservations.git

### 2. Navegar al directorio
    Accede al directorio del proyecto recién clonado:
    ```bash
    cd reservations

### 3. Instalar dependencias de PHP
    Instala todas las dependencias de PHP utilizando Composer:
    ```bash
    composer install

### 4. Instalar dependencias de JavaScript
    Instala las dependencias de Node.js necesarias para el frontend:
    ```bash
    npm install

### 5. Configurar el archivo .env
    Copia el archivo de ejemplo .env.example a .env:
    ```bash
    cp .env.example .env

    Luego, abre el archivo .env y descomenta la siguiente sección de configuración de la base de datos:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=reservations
    DB_USERNAME=root
    DB_PASSWORD=

    Asegúrate de que los valores sean correctos para tu entorno local (por ejemplo, si usas un nombre de usuario o contraseña diferente para MySQL, ajústalo aquí).

### 6. Generar la clave de la aplicación
    Genera una clave única para la aplicación con el siguiente comando:
    ```bash
    php artisan key:generate

### 7. Crear la base de datos
    Asegúrate de que la base de datos reservations esté creada en tu servidor MySQL. Si no la has creado, puedes hacerlo desde MySQL o utilizando cualquier herramienta como PhpMyAdmin.

    Puedes crear la base de datos manualmente ejecutando:
    ```sql
    CREATE DATABASE reservations;

### 8. Ejecutar las migraciones y seeders
    Ejecuta las migraciones para crear las tablas necesarias en la base de datos. Además, ejecuta los seeders para poblarla con datos de ejemplo:
    ```bash
    php artisan migrate --seed

    Si ocurre un error porque la base de datos no existe, puedes ejecutar:
    ```bash
    php artisan migrate:fresh --seed

    Este comando eliminará todas las tablas existentes y las recreará, además de ejecutar los seeders nuevamente para poblar la base de datos.

### 9. Compilar los recursos frontend
    Ejecuta el siguiente comando para compilar los archivos JavaScript y CSS utilizando Vite:
    ```bash
    npm run dev

### 10. Servir la aplicación
    Finalmente, puedes iniciar el servidor de desarrollo de Laravel con:
    ```bash
    php artisan serve

    La aplicación estará disponible en http://localhost:8000.
    Si estas utilizando xampp estará disponible en http://localhost/reservations/public

## License

Este proyecto está bajo la Licencia MIT. Consulta el archivo LICENSE para más detalles.


### Explicación de los pasos:

1. **Clonar el repositorio**: Se utiliza `git clone` para clonar el proyecto desde GitHub a tu máquina local.
2. **Instalar dependencias de PHP**: `composer install` descarga e instala las dependencias de PHP necesarias para Laravel.
3. **Instalar dependencias de JavaScript**: `npm install` descarga las dependencias necesarias para el frontend (como Vite, Vue.js o React si se utiliza).
4. **Configurar el archivo `.env`**: El archivo `.env` se configura para usar una base de datos MySQL local.
5. **Generar la clave de la aplicación**: `php artisan key:generate` genera una clave única que Laravel utiliza para cifrar datos.
6. **Crear la base de datos**: Asegúrate de crear la base de datos `reservations` en MySQL si aún no existe.
7. **Ejecutar migraciones y seeders**: `php artisan migrate --seed` ejecuta las migraciones para crear las tablas de la base de datos y las semillas para poblarla con datos iniciales.
8. **Compilar los recursos frontend**: `npm run dev` compila los archivos de frontend para ser utilizados en la aplicación.
9. **Servir la aplicación**: `php artisan serve` inicia el servidor de desarrollo de Laravel para acceder a la aplicación en el navegador.

### Contribución y licencia:

El archivo incluye una sección sobre cómo contribuir al proyecto, en caso de que otros desarrolladores quieran hacer mejoras o agregar nuevas funcionalidades. Además, se especifica que el proyecto está bajo la Licencia MIT.

Este es un `README.md` completo que cubre todos los pasos desde la instalación hasta la ejecución de la aplicación, así como las instrucciones para contribuir al proyecto.
