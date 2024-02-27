<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalación
- En el directorio de apache, crear carpeta para sistema de backend: mkdir back-demo
- Ingresar al directorio: cd back-demo
- Iniciar repositorio: git init
- Ejecutar: git branch -M main
- Ejecutar: git branch
- Clonar repositorio remoto: git pull https://github.com/suselancha/backend-biblioteca.git
- Ejecutar: git status
- Instalar dependencias: composer install --no-interaction --no-dev --prefer-dist
- Ejecutar migraciones y seed: php artisan migrate --force
- Ejecutar: php artisan optimize:clear
- Ejecutar: php artisan config:cache
- Ejecutar: php artisan route:cache
- Ejecutar: php artisan view:cache
- Importar la base de datos a mysql con el archivo "db_biblioteca.sql" desde la carpeta "instaladores"
- Correr el servidor: php artisan serve

## POSTMAN
- Archivo .json para importar desde Postman y probar la ApiRest
- Ubicado en la carpeta "instaladores"

## Observaciones
- Definición de rutas para ApiRest, con o sin autenticación
- Uso del paquete Laravel Permission
- Uso de autenticacion via JWT (JSON Web Token)
- Habiliracion de CORS (Cross-Origin Resource Sharing.)
- Uso de migraciones y seeders
- Uso de controladores, ApiResponse (Responses) y validaciones (Request)
- Uso de controladores: CRUD
- Uso de recursos y colecciones (Resources)
- Definición de modelos: relaciones, scopeFilterAdvance