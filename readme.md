# Todo List Example Laravel App

This is an example todo list application built with Laravel, Vue JS and Postgres.

## Requirements

Docker and Docker Compose must both be installed on the host.

You will need to create the database:

```sql
CREATE DATABASE todo_list
```

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