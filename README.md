<p align="left">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About This Repo

This repo books app using laravel 6, database Mysql and Docker 

## Step by Step

1. Clone this project 

2. Install project dependencies for this project

   ```console
   composer install
   ```

3. After install the dependencies you can create container using docker compose, follow this command

   ```
   docker-compose up -d
   ```

4. If this process didn't get an error you can set the .env laravel project like this

   ```
   DB_CONNECTION=mysql
   
   DB_HOST=db
   
   DB_PORT=3306
   
   DB_DATABASE=laravel
   
   DB_USERNAME=book
   
   DB_PASSWORD=laravel
   ```

5. After this step you can migrate table and seeder table using docker exec

   ```
   docker-compose exec app php artisan migrate --seed
   ```

6. If didn't error you can acces this app using host:port example running on local development

   ```
   localhost:8082
   ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
