# Todo List Example Laravel App

This is an example todo list application built with Laravel, Vue JS and Postgres.

Test user credentials:

User: user1
email: user1@example.com
password: secret

Once all commands below have been run you should be able to access the application at http://localhost:8772/

## Quick Start 

```bash
docker-compose build
```

```bash
docker-compose up
```

## Requirements

Docker and Docker Compose must both be installed on the host. Once the containers are started you can create databases with the following commands

You will need to create the main database and a test database:

```sql
 docker exec -it db bash -c "psql --username=postgres -c 'CREATE DATABASE todo_list;'"
```

```sql
 docker exec -it db bash -c "psql --username=postgres -c 'CREATE DATABASE todo_list_test;'"
```

```bash
bash ./commands.sh
```

Or run each command in the shell script manually.

This project can be setup with the commands below. Which will also run all migrations and seed database.

Additional SQL files have been provided in the sql directory. These can also be used to get a demo database up and running.

## Commands

Build the containers
```bash
docker-compose build
```

Start the containers
```bash
docker-compose up
```

Install PHP dependencies 
```bash
docker exec -it web bash -c "composer install"
```

Database rerun all migrations and seed
```bash
docker exec -it web bash -c "php artisan migrate:fresh && php artisan db:seed"
```

Install JS dependencies 
```bash
docker exec -it web bash -c "npm install"
```


Watch JS
```bash
docker exec -it web bash -c "npm run watch"
```

Run Tests:
```bash
docker exec -it web bash -c "php vendor/bin/phpunit" 
```