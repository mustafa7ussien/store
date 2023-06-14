<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
# Simply Store System Using Laravel

# Topics
=>view & layouts
=>Database & migration
=>Seeder ex) User::factory(20)->create(); 
=>Auth breeze package
=>CRUD 
=>FilleSysytem & Upload img
...update soon

## Installation
1- Download or Clone the project
2-check file ".env" there is in the project and set name of database

3- Open the project in vs Code 

4- In a Terminal window run the following >>

```bash
composer update
```
```bash
composer i
```
```bash
npm i
```
```bash
create database name Store as type of utf8mb4_unicode_ci
```
```bash
npm run dev
```
5- Run the following to load DB & Seed Data
```bash
php artisan migrate
```
```bash
php artisan migrate:fresh
```
6- After All is Finished run
```bash
php artisan serve
```


## About Laravel MVC
'M'=>['Category','Product','Store','User'];
'C'=>['ProfileController','DashboardController','Dashboard'=>['CategoryController']]
'V'=>['layouts','auth','profile'=>[],'dashboard'=>[categories',]]

## Auth breeze Package
```bash
composer require laravel/breeze --dev
```
```bash
php artisan breeze:install
```

# Make Controller
```bash
php artisan make:controller nameController
``` 

# Make Model
```bash
php artisan make:model Name
```

## Make Model&table migration file
```bash
php artisan make:model Name -m
```

# Resource controller to spaecific model
```bash
php artisan make:controller NameController -m Name
```

# make table in database using laravel
```bash
php artisan make:migration create_names_table
```

# Resource controller make Model&Controller&MigrationFile  in one step
```bash
php artisan make:model Name -mcr
```
## Move file storage to public
```bash
php artisan storage:link
```




