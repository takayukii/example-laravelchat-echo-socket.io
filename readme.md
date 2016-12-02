# Laravel Echo Chat Sample

This sample is sample chat app using [Laravel Echo](https://github.com/laravel/echo) and [Laravel Echo Server](https://github.com/tlaverdure/laravel-echo-server). 

With Larave Echo and Laravel Echo Server, both private message and broadcast message are easy to implemented.  

## Prerequisites

* Laravel 5.3
* MySQL
* Redis
* Node.js 4.* or above

## How to run app

#### Clone app

```
$ git clone https://github.com/takayukii/example-Laravelchat-Echo-Socket.io
```

#### Edit .env

Specify database, user, password.

```
DB_DATABASE=websocket
DB_USERNAME=websocket
DB_PASSWORD=websocket
```

#### Change host name

I specified "192.168.33.40" for host name. Change it with your own.

* laravel-echo-server.json
* resources/assets/js/bootstrap.js
* resources/views/layouts/app.blade.php

#### Install libraries

```
$ npm install
$ composer install
```

#### Migration

```
$ php artisan migrate:refresh --seed
```

#### Install Laravel Echo Server

```
$ npm install -g laravel-echo-server
```

#### Precompile assets

```
$ ./node_modules/.bin/gulp 
```

#### Run servers

```
$ php artisan serve
```

```
$ laravel-echo-server start
```

## Demo

[YouTube](https://youtu.be/gL26GteTbD8)

1. Open http://<your host>:8000/home
2. Login (see database/seeds/UsersTableSeeder.php)
3. Test chat
4. Test broadcast message (php artisan websocket:news hogehoge)

