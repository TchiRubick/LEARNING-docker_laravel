# Lancement de l'appliaction

Il est recommandée d'utilisé Docker pour lancer l'application mais cela n'est pas une obligation.

Il vous faudra par contre avoir les stack suivants pour pouvoir le lancer si vous n'avez pas docker:

* PHP 7.4
* Mysql 5
* Composer

## Ports

Ports used in the project:
| Software | Port |
|-------------- | -------------- |
| **nginx** | 8080 |
| **phpmyadmin** | 8081 |
| **mysql** | 3306 |
| **php** | 9000 |
| **xdebug** | 9001 |

## Use

1. Clone this project:

2. Install dependencies with *composer*

   Move into the source directory and run

   ```sh
   composer install
   ```

   or you can rely on a third party docker container if you don't have composer installed

3. Build the project whit the next commands:

   ```sh
   docker-compose up -d --build
   ```

4. Migration

   Run migration to populate the database with all of the simulation data

   ```sh
   php artisan migrate
   ```
