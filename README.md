# National Accreditation and Quality Assurance Authority Electronic Information Management System

This is a web application system for the National Accreditation and Quality Assurance Authority.
It consists of digitalizing the workflow of the Authority to facilitate the management of the national qualification system.

## Application Modules

The Application is divided into **5** modules:

1. Sysadmin
2. Standards and Curriculum
3. Assessment and Certification
4. Research and Development
5. Registration and Accreditation

## Pre-requisites

To be able to run this application, you must have:

1. PHP 7.4 running on your machine.
2. Composer

## Installation Procedure

To install and run the application, **PLEASE FOLLOW THE FOLLOWING PROCEDURES CAREFULLY**.

**Clone the github repo**.

> git clone https://github.com/NiftyICTSolutions/NAQAA-webApp-project.git

Once cloning is done, move to the folder where you clone the repository and open command prompt from that folder
or open a command prompt and navigate to the folder where you clone the repository and run the following commands:

**Install the project dependencies**  
Type the following command:

> composer install

**create .env file**  
After installing the project dependencies, make a copy of the .env.example file and rename it to .env.
The .env.example file is located in the root folder of your application.

**Generate Application key**  
Type the following command:

> php artisan key:generate

**Create a database**  
Create database and fill the connection details of the database in the .env file

**Run migrations and seeds**  
After filling the database credential details in the .env file, type the following command
in your command prompt to run the migrations and seeders

> php artisan migrate:fresh --seed

**Run your Application**  
After migration and seeding of the database, test the application by running.

> php artisan serve

or you can set up localhost to serve your application from your folder without typing the **artisan serve** command.

## Project Structure

The structure of the folder is important to understand. All the files are structured based on modules in folders.  
You can reference files about a specific module by accessing the respective folder of that module named according to the module.

## Routes files

All the routes about the application and its module is stored in the web.php file in the routes folder.  
Authentication routes are stored in the the auth.php file in the routes folder.

## Technologies

The core technology of the application is built with [PHP](https://php.net) and [Laravel](https://laravel.com) Framework.  
However, there are also other technologies, that are couple with the core ones to extend the functionalities of the application and provide a very good user experience.  
The following are one of the key technologiess used in the application:

1. [Laravel-livewire](https://laravel-livewire.com)
2. [Laravel-excel](https://laravel-excel.com)
3. [Laravel-breeze](https://laravel.com/docs/8.x/starter-kits)
4. [Laravel Sweet Alert](https://realrashid.github.io/sweet-alert/)
5. [Laravel activity log](https://spatie.be/docs/laravel-activitylog/v4/introduction)
6. [Laravel debugbar](https://github.com/barryvdh/laravel-debugbar)

## Credits

[Laravel](https://laravel.com)  
[Laravel-livewire](https://laravel-livewire.com)  
[Admin Lte](https://adminlte.io)
