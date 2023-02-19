# ag_systems Api

## Tech stack

PHP 8.1.12

Laravel 10

## Installation

Copy repository

In your database client create database 'app_ag'

```sql
CREATE DATABASE app_ag
```

Create in project's root directory file .env, and copy all contents from .env.example file to them

In .env file, set your database connection 

```bash

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=products
DB_USERNAME=root
DB_PASSWORD=

```

Create tables in database by migrations

```bash

php artisan migrate

```


Run app

```bash

php artisan serve

```

Your app should be available on 

```url 

localhost:8000

```
