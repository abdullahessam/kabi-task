# Kabi Technical Assessment

overlapping price for booking site

## Installation

### Prerequisites

* You must have Docker installed.

```shell
git clone https://github.com/abdullahessam/kabi-task.git
cd kabi-task
cp .env.example .env
composer install
php artisan key:generate
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed --class=PriceSeeder
```

## Used Ports

this is the ports I used to for the project

| Port |     usage      |
|:-----|:--------------:|
| 8080 | laravel server |
| 3307 |     mysql      |


feel free to update any port in .env file

# Database structure

* used 1 table for the prices (id , start_at , end_at , price)

# How it works ?

* using laravel sail package that provides ready docker container for the project php-8.2 / mysql 


# API Documentation and Endpoints

here is the postman collection for the api endpoints you can import it and test the api .
`GET /api/price` : with query params start_at and end_at for example .
<pre>
`GET /api/price?start_at=2021-10-10 10:00:00&end_at=2021-10-10 12:00:00` 
</pre>
# The Main Packages I used

* laravel sail
* Spatie Data

# Files Structure

* app/Http/Controllers/ : contains the api controllers
* app/Http/Requests/ : contains the api requests
* app/Models/ : contains the models
* app/Domains : contains the business logic
* app/Exceptions/ : contains the custom exceptions
* database/migrations/ : contains the database migrations
* database/seeders/ : contains the database seeder
* route/api.php : contains the api routes
* ./docker-compose.yml --> the docker compose file.
* ./docker/* --> Contains the docker services configurations such nginx.
* ./config/*.php --> Contains the configuration files such as sanctum and more.

# Finally

* thanks and if you have any questions please contact me.
