<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Clone project into PC(local project) 
1. After download project from git
    - copy this ``git clone git@github.com:iphearum/todo.git`` past to terminal or CMD then **ENTER** for download **main** branch
    - copy this ``git clone --branch lesson_3 git@github.com:iphearum/todo.git`` past to terminal or CMD then **ENTER** for download **lesson_3** branch
    - For **rename** the folder project to other **name**, you can add more name in last line like ``git clone ...todo.git you_custom_name``
3. Copy ``.env.example`` to ``.env``
    - Run the command ``composer install``
    - Edit connection with your database service
5. Generate key for laravel project to be unique with connection
    - Run the command ``php artisan key:generate`` or ``php artisan key:gen`` for generate key
7. Migration
    - Run the command ``php artisan migration``
9. Host
    - Run the command ``php artisan serve``
