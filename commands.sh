#!/bin/bash

docker exec -it db bash -c "psql --username=postgres -c 'CREATE DATABASE todo_list;'"
docker exec -it db bash -c "psql --username=postgres -c 'CREATE DATABASE todo_list_test;'"
docker exec -it web bash -c "composer install"
docker exec -it web bash -c "npm install"
docker exec -it web bash -c "php artisan migrate:fresh && php artisan db:seed"
