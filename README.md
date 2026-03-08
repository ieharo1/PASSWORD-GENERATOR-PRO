# Password Generator Pro

Proyecto desarrollado por **Isaac Esteban Haro Torres**.

---

## Descripción

Sistema profesional de generación de contraseñas seguras con niveles de seguridad ajustables, cálculo de entropía, historial de contraseñas y estadísticas en tiempo real.

---

## Características

- Generación de contraseñas con 4 niveles de seguridad: Bajo, Medio, Alto y Ultra Seguro
- Configuración personalizable: longitud, mayúsculas, minúsculas, números y símbolos
- Cálculo de entropía en bits
- Indicador visual de nivel de seguridad
- Botón para copiar contraseña al portapapeles
- Historial de contraseñas generadas con persistencia en base de datos
- Dashboard con estadísticas: total de contraseñas, entropía promedio, distribución por nivel
- Interfaz moderna con Bootstrap 5 y gradientes

---

## Stack Tecnológico

* PHP 8.2
* Laravel 11
* Livewire 3
* Bootstrap 5
* MySQL 8.0
* Docker
* Docker Compose

---

## Instalación desde cero

1. Clonar el repositorio
2. Ejecutar `docker compose up -d --build`
3. Esperar a que los contenedores estén levantados
4. Ejecutar migraciones: `docker compose exec app php artisan migrate`
5. Ejecutar seeders: `docker compose exec app php artisan db:seed`
6. Acceder al sistema en `http://localhost:8000`

### Configuración de Base de Datos

El sistema está configurado para usar MySQL con las siguientes credenciales:
- Host: mysql
- Database: password_generator
- User: laravel
- Password: laravel

---

## Desarrollado por Isaac Esteban Haro Torres

Ingeniero en Sistemas · Full Stack · Automatización · Data

Email: [zackharo1@gmail.com](mailto:zackharo1@gmail.com)

WhatsApp: 098805517

GitHub: https://github.com/ieharo1

Portafolio: https://ieharo1.github.io/portafolio-isaac.haro/

---

## Licencia

© 2026 Isaac Esteban Haro Torres
