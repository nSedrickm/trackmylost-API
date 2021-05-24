## TrackMyLost Server

### Setup guide

1) Clone the code

2) Create a new database in MySQL

3) Create .env file from .env.example template

    ```bash
    cp .env.example .env
    ```
4) Open .env file and fill in the database connection details

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```
5) install composer dependencies

    ```bash
    composer install
    ```
6) Migrate database schema

    ```bash
    php artisan migrate
    ```
7) generate a new encryption key

    ```bash
    php artisan key:generate
    ```
8) Start the server

    ```bash
    php artisan serve
    ```