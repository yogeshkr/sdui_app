# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Prerequisites :

- Docker 

- Composer

 

## Steps for project setup:

- Open terminal. 
- Clone project.
- Change directory to project directory.
- RUN command /*docker-compose up*/
- Check site is up on /*http://localhost:8100*/
- Run command /*docker-compose exec -T composer install*/ to migrate tables.
- Run command /*docker-compose exec -T app php artisan migrate*/ to migrate tables.
- Run command /*docker-compose exec -T app php artisan db:seed*/ to seed dummny data.
- Run command /*docker-compose exec -T app php artisan command:delete:news*/ to delete all news entries older than 14 days

docker-compose exec -T app ./vendor/bin/phpunit

- Open terminal.

- Go to the project directory.

- Run command docker-compose up

- Run command docker exec -it dashboardapp-php-fpm-1 /bin/sh

- Run command to migrate migrations bin/console doctrine:migrations:migrate.

- Run command composer install

- Run command bin/phpunit for unit test cases


Here you can see the dashboard with data.

- http://localhost:8000/
