# Facturas / Bills

## Installation

### Setting up the project on your local machine ###

#### 1. Commands. ####
```bash
$ git clone https://github.com/mshago/facturas.git
$ cd facturas
$ cp .env.example .env
$ composer install
$ npm install
$ php artisan key:generate
```
#### 2. Create an empty database for the application. ####
#### 3. Add database information in the .env file to allow Laravel to connect to the database. ####
You must fill the *DB_HOST*, *DB_PORT*, *DB_DATABASE*, *DB_USERNAME* and *DB_PASSWORD* variables to match the credentials.

#### 4. Migrate and seed the database ####
```bash
$ php artisan migrate
$ php artisan db:migrate
```
