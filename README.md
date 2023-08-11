## Sistema de Gestión de Proveedores, Productos y Regiones

El siguiente sistema fue diseñado cumplir una prueba de actividad laboral.

### Instrucciones:

1. Para ejecutar el sistema, es necesario contar con el Programa Laragon

https://laragon.org/download/index.html

2. Para clonar el repositorio, es necesario ejecutar los siguientes comandos:

1.Run git clone <Sistema-Gestor-Proveedores-de-Productos>

2.Run composer install

3.Run cp .env.example .env

4.Run php artisan key:generate

5.Run php artisan migrate:fresh --seed

6.Run php artisan serve

7.Go to link localhost:8000