# Plagiarism Checker
 This project is for plagiarism checker
 
# description de la procedure a suivre
#### PRESENTATION OF THE DATABASE
1. Type table
2. User table

#### PACKAGES INSTALL
1. artesaos/seotools: for Seach Engine Optimization (SEO)
2. brian2694/laravel-toastr: for Toast notification


#### HOW TO RUN THE App
1. Clone the repository from Heroku CLI
2. Install all the necessary packages by: `$ composer install` or `$ composer update `
3. Create the .env file by typing the command:`$ cp .env.example .env`
4. Generate Application key with: `$ php artisan key:generate`
5. Run the migration (create the database): `$ php artisan migrate`
6. Insert dumy data: `$ php artisan db:seed`
7. Run the app: `$ php artisan serve` and launch your browser on the url from your local machine
8. Enjoy !!!


#### SOME COMMAND
1. for create controller => php artisan make:controller Api\UserController
2. for create model and migration => php artisan make:model DOc -m
3. for create a seeder => php artisan make:seeder UsersTableSeeder
4. for apply seeder in database => php artisan migrate:fresh --seed
5. for fresh all route and clear cash => php artisan optimize
6. for create a middleware => php artisan make:middleware AdminMiddleware
7. for create model => php artisan make:model contact
8. for make seed => php artisan migrate:fresh --seed
9. for specific seed => php artisan migrate:fresh --seed --seeder=UserSeeder
10. for adding toast => composer require brian2694/laravel-toastr
11. for install PHP Wrapper for libreOffice => composer require ncjoes/office-converter
12. To run the schedule process =>  php artisan schedule:work


