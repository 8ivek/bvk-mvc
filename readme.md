# Simplest MVC Framework

Simplest MVC Framework for those who want to learn how MVC actually works

minimum php version requirement: 8.0

## install composer
> docker-compose exec app composer install

## docker common commands
> docker-compose build
> 
> docker-compose up -d
> 
> docker-compose down

alternative,
> docker-compose up --build

## docker remove unused images
> docker image prune
> 
> docker image prune -a
> 
> docker image prune -af (verbose)

## docker ssh inside app
> docker exec -ti app sh
> 
> docker ps (list active containers)
> 
> docker inspect container_id (inspect inside container)

## update docker db with db dump
docker exec -i db mysql -uadmincha -psecret bvk_mvc < docker/mysql/data.sql

## export database to local system
docker exec db mysqldump -u admincha --password=secret bvk_mvc > db_from_docker.sql

## Test url
https://localhost/info.php

### Message
Thanks cheers :smile: :gift_heart: :love_letter: :rose: