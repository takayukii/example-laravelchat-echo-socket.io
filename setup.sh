#!/bin/bash

docker-compose run app composer install
docker-compose run node npm install
docker-compose run app php artisan migrate:refresh --seed
docker-compose run node gulp
