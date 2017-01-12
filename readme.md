# Laravel Echo Chat Sample

This is sample chat app using [Laravel Echo](https://github.com/laravel/echo) and [Laravel Echo Server](https://github.com/tlaverdure/laravel-echo-server). 

With Laravel Echo and Laravel Echo Server, both realtime private message and broadcast message can be implemented very easily. Programming in Node.js is not needed.  

## Prerequisites

* Docker

## How to run app

Execute `bash setup.sh` or run following commands step by step.

#### Clone and run

```
$ git clone https://github.com/takayukii/example-Laravelchat-Echo-Socket.io
$ cd example-Laravelchat-Echo-Socket.io
$ docker-compose up
```

#### Install libraries

```
$ docker-compose run app composer install
$ docker-compose run node npm install
```

#### Migration

```
$ docker-compose run app php artisan migrate:refresh --seed
```

#### Precompile assets

```
$ docker-compose run node gulp
```

## Demo

1. Open http://localhost/home
2. Login (see database/seeds/UsersTableSeeder.php)
3. Test chat
4. Test broadcast message (php artisan websocket:news hogehoge)

[YouTube](https://youtu.be/gL26GteTbD8)
