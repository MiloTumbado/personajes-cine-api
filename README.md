# Personajes de cine API

Tarea 12. API Laravel para fichas de personajes y películas/series, con relación N:M. Cada ficha contiene nombre, imagen por URL y descripción. Cada producción contiene nombre, tipo, clasificación, estreno, reseña y temporada cuando es serie.

Aplicaciones web · Módulo 3 · Emilio Garza Vargas.

## Ejecutar

Requiere PHP 7.4, Composer y extensiones SQLite. Laravel 7 se conserva por la consigna académica; ejecutar en desarrollo local.

```sh
composer install
cp .env.example .env
php -r "touch('database/database.sqlite');"
# Configurar DB_DATABASE con la ruta absoluta del archivo SQLite en .env
php artisan key:generate
php artisan migrate --seed
php artisan serve --host=127.0.0.1 --port=8915
```

No se incluyen vendor, .env ni la base privada. Las migraciones y los seeders reconstruyen los datos de ejemplo.

## API
GET y POST /api/characters y /api/productions; GET, PUT, PATCH, DELETE /api/characters/{id} y /api/productions/{id}.
Personaje: name, picture (URL), description, production_ids (array de identificadores existentes).
Producción: name, type (movie o series), classification, release_date (YYYY-MM-DD), review, season (obligatoria en series, null en películas).
Se valida la existencia y unicidad de relaciones; escritura de personajes y sync de la tabla pivote en una transacción. El borrado de una producción elimina sus vínculos, no los personajes. La imagen de ejemplo representa al actor Chuck Norris y proviene de la URL proporcionada en el ejercicio de Vue. Las reseñas son descripciones propias breves.
