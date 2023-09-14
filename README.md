# Employee Management App

User can create, read, update, delete employees(CRUD) in this application.

Created using Laravel, Laravel passport, Laravel Breeze, Xampp Mysql, Rest API(Thunder Client), Vite

## Insight Images



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Project Setup and Installation Guide
Welcome to the setup and installation guide for the Laravel project! This guide will walk you through the steps required to set up the project on your local machine. Please follow these instructions carefully to ensure a smooth setup process.

## Prerequisites
Before you begin, make sure you have the following software installed on your machine:

* Composer
* Node.js and npm
* Xampp
* Git

## Step 1: Clone the Repository
Clone the project.

## Step 2: Install Composer Dependencies
Navigate to the project directory using the terminal:


`cd your-laravel-project`


Install the project's PHP dependencies using Composer:


`composer install`


## Step 3: Set Up Environment Variables
Copy the .env.example file and create a new .env file:


`cp .env.example .env`


Generate a unique application key:


`php artisan key:generate`


## Step 4: Database Migration and Seeding
Run database migrations and seed the database with sample data:

//Remove `--seed` if there is nothing to seed.
`php artisan migrate --seed`

* Don't forget to run Xampp->MySql Database first*


## Step 5: Start the Development Server
Start the Laravel development server:


`php artisan serve`


Your Laravel application should now be running at http://127.0.0.1:8000. You can access it in your web browser.

## Step 6: Install Laravel Passport

Install laravel passport via artisan for Client ID and Secret

`php artisan passport:install`

Check the Xampp Database (Admin -> oauth_clients) whether clients exists or not.

## Step 7: Install extension Thunder Client (Rest API) in your Vs Code
Go to Vscode Extensions -> in search bar, type (Thunder Client) -> Install it

## Step 8: Install and Set Up Vite (Optional)
If your project uses Vite for frontend development, follow these steps. Otherwise, you can skip this section. In this project I used vite.

Install npm dependencies:


`npm install`


Compile and watch for frontend changes:


`npm run dev`


## Additional Steps

Troubleshooting: If you encounter any issues during setup, please refer to the [Laravel documentation](https://laravel.com/docs) or seek help from the community.

Configuration: Review the `.env` file to configure database connections, mail settings, and other application-specific configurations.

Customization: Customize the project according to your needs by modifying routes, controllers, views, and assets.

Testing: Run tests using php artisan test and ensure that the application works as expected.

Deployment: When deploying the project to a production server, make sure to set up proper server configurations and security measures.

## Conclusion

Congratulations! You've successfully set up the Laravel project on your local machine. If you have any questions or need assistance, feel free to reach out to the project's maintainers or refer to the resources mentioned in this guide. Happy coding!
