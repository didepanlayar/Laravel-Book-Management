<div align="center">
    <img src="https://res.cloudinary.com/rexcuni/image/upload/v1688969225/favicon_oxddqi.png" width="80px">
    <br>
    <h1>Laravel Book Management</h1>
</div>
<p align="center">
    <a href="https://didepanlayar.com" target="_blank"><img alt="" src="https://img.shields.io/badge/Website-1DA1F2?style=normal&logo=dribbble&logoColor=white" style="vertical-align: center" /></a>
    <a href="https://instagram.com/didepanlayar" target="_blank"><img alt="" src="https://img.shields.io/badge/Instagram-DD2A7B?style=normal&logo=instagram&logoColor=white" style="vertical-align: center" /></a>
    <a href="https://www.youtube.com/@didepanlayar" target="_blank"><img alt="" src="https://img.shields.io/badge/YouTube-CD201F?style=normal&logo=youtube&logoColor=white" style="vertical-align: center" /></a>
</p>

## Description
Book Management App with Laravel Framework from scratch.

## Features
- Manage Users
- Manage Categories
- Manage Books
- Manage Orders

## Environment
To run this project you need to upload database and add following environment variables to your `.env` file.

```sh
APP_NAME=BookManagement
APP_ENV=production
APP_KEY=base64:lxf3F2S36U/w6CbZzhHlT5yWUzpJ+soV9gRtCYomGW8=
APP_DEBUG=false
APP_URL=https://domain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_user
DB_PASSWORD=database_password
```

## Installation
Before uploading the project, run this command:
```sh
php artisan cache:clear;
composer install --optimize-autoloader --no-dev;
```

Option:
```sh
php artisan route:cache
```
If you experience the error `Unable to prepare route [*/*] for serialization. Uses Closure.` Then skip the command. Or if you still want to caching the route, you have to eliminate the cause of the error above, namely the existence of a route definition that does not use a controller but uses Closure directly on the route, the use of closures in route definitions means that we cannot caching routes.

## Screenshots
<img src="https://res.cloudinary.com/rexcuni/image/upload/v1709137494/Laravel_-_Book_Management_inltbg.png" width="100%">

## Tech Stack
- Laravel
- Visual Studio Code
- Docker
- Nginx
- MariaDB
- DBeaver