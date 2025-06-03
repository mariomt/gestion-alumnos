<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## ✨ Sobre este proyecto

Este proyecto fue creado con Laravel 7 como una prueba técnica.

Se utilizó Docker como entorno de desarrollo para evitar conflictos con las dependencias locales del equipo. Sin embargo, también puedes ejecutarlo directamente en tu equipo si cuentas con los requisitos necesarios 🙌

## ✅ Requerimientos
- Laravel 7
- Composer
- php ^7.2|^8.0
- MySQL o SQLite (solo para pruebas)


## 🚀 Cómo iniciar la aplicación
Sigue los siguientes pasos para ejecutar la aplicación de forma local:

1. Ubícate en la carpeta donde deseas clonar el repositorio.

2. Clona el repositorio:
```bash
git clone <URL-del-repositorio>
```

3. Ingresa al directorio del proyecto:
```bash
cd nombre-del-proyecto
```

4. Instala las dependencias del proyecto:
```bash
composer install 
```

5. Configura el archivo **.env**. Como esta aplicación envía correos electrónicos, es importante definir correctamente las variables relacionadas al correo.

6. Ejecuta las migraciones y seeders con el siguiente comando:
```bash
php artisan migrate --seed
```

7. 🚀 AInicia el servidor de desarrollo: 

```bash
php artisan serve 
```

La aplicación estará disponible en http://localhost:8000


## 🐋 Ejecutar la aplicación con Docker 

Para ejecutar la aplicación con Docker, asegúrate de tener instalados Docker y Docker Compose en tu equipo.

Una vez instalados, ejecuta:
```bash
docker compose up -d --build
```

Este comando levantará dos contenedores: uno para la aplicación y otro para la base de datos. La configuración de usuario y contraseña de la base de datos se encuentra en el archivo **docker-compose.yml**, y debe reflejarse correctamente en el archivo **.env**.

La aplicación estará disponible en el puerto **8000** de tu máquina.

### ⚒️ Ejecutar comandos dentro del contenedor

ara ejecutar comandos como migraciones u otros comandos de Artisan desde Docker:

1. Obtén el ID del contenedor:
```bash
docker ps
```

2. Accede al contenedor:
```bash
docker exec -it ID-CONTENEDOR /bin/bash
```

3. Una vez dentro, puedes usar Artisan normalmente.