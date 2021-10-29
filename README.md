# National Accreditation and Quality Assurance Authority Electronic Information Management System

This is a web application system for the National Accreditation and Quality Assurance Authority.
It consists of digitalizing the workflow of the Authority to facilitate the management of the national qualification system.

## Application Modules

The Application is divied into **5** modules:

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

**Install the project dependencies**.
Type the following command:

> composer install

**create .env file**.
After installing the project dependencies, make a copy of the .env.example file and rename it to .env.
The .env.example file is located in the root folder of your application.

**Generate Application key**.
Type the following command:

> php artisan key:generate

**Create a database**.
Create database and fill the connection details of the database in the .env file

**Run migrations and seeds**.
After filling the database credential details in the .env file, type the following command
in your command prompt to run the migrations and seeders

> php artisan migrate:fresh --seed

**Run your Application**.
After migration and seeding of the database, test the application by running.

> php artisan serve

or you can set up localhost to serve your application from your folder without typing the **artisan serve** command.
