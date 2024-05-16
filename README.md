# To Do List Application

## Prerequirement

### Set Up Development Environment

-   Xampp v 3.3.0 (https://www.apachefriends.org/download.html)

    -   PHP 8.2.12
    -   MariaDB 10.4.32
    -   Apache 2.4.58
    -   phpMyAdmin 5.2.1
    -   OpenSSL 4.63

### Set Up Laravel Project

-   Install Composer (Download and install Composer from the official website.)

-   Composer version 2.7.6 2024-05-04

## Backend Setup (Project Create)

1. Create a Project with laravel command.

    - composer create-project laravel/laravel todolist

2. Create Database on MySQL

    - database name -> todolist

3. Connect with Project with Database on env

    - DB_HOST=127.0.0.1
    - DB_CONNECTION=mysql
    - DB_PORT=3306
    - DB_DATABASE=todolist
    - DB_USERNAME=root
    - DB_PASSWORD=

4. validate database with _php artisan migrate_ Command

5. Create Model

    - php artisan make:model Todo -m

6. Define ToDo Model and Migration:

-   Edit the migration file (database/migrations/create_todos_table.php) to define the schema for the todos table.
-   Then, run migration:

7. Create Controller

-   php artisan make:controller TodoController

8. ## Craet Routes
    -varify route on browser

## Fronend Create

-   index view
    using --> <script src="https://cdn.tailwindcss.com"></script> at HTML Heading
-   create view
-   edit view

## RUN APPLICATION

-   Copy Project Folder to you _"xampp/htdoc/"_.
-   Open Project Folder on Visual Code.
-   Type command in terminal -> **"php artisan serve"**

# Author Summary

    - Only Use Database for data transaction because I'm start learner for PHP, Laravel and API. So in this project will not be include about building API endpoint.

    - This detailed guide should help you set up a ToDo list web application using Laravel, MySQL, and Bootstrap, including model creation, views, controllers, routes, and deployment/setup instructions. Feel free to modify and expand the instructions according to your specific project needs!
