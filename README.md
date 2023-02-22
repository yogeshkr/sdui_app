## Prerequisites :
- Docker 
- Composer

## Steps for project setup :

- Open terminal. 
- Clone project.
- Change directory to project directory.
- RUN command *docker-compose up*
- Check site is up on *http:localhost:8100*
- Run command *docker-compose exec -T composer install*
- Run command *docker-compose exec -T app php artisan migrate* to migrate tables.
- Run command *docker-compose exec -T app php artisan db:seed* to seed dummny data.
- Run command *docker-compose exec -T app php artisan command:delete:news* to delete all news entries older than 14 days
- Run command *docker-compose exec -T app .vendorbinphpunit* to ececute unit test cases
- Import Postman collecion for news CRUD API *API Collection.postman_collection.json* attached in project root folder.
- Update values for envrionment variables in postman (*domain* and *authToken*).
