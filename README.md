# laravel-blog

A simple blog demo (with notes and comments) output using laravel from [Laracasts Laravel 5.4 tutorials](https://laracasts.com/series/laravel-from-scratch-2017).

This demo has no user authentication and login.

## Tools and Plugins

1. Composer
2. NodeJS
2. MySQL via xampp (7.2.9 / PHP 7.2.9)
3. PHP 7.0+
3. VS Code for IDE
4. [Laravel Blade Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade) as plugin for VS Code
5. Laravel 5.7 (installed using Composer)

## Usage

1. Clone this repository into your local directory.
2. Navigate to the cloned directory from the command line. <br>
Run `composer install`.
3. Copy the contents of `.env.example` to a new file, `.env`. Set the following parameters: 

		DB_DATABASE=blog
		DB_USERNAME=root
		DB_PASSWORD=

4. Run `php artisan migrate`
5. Run `php artisan key:generate`
6. Run this project on browser: `php artisan serve`. <br> Open the resulting URL `http://127.0.0.1:8000` to a web browser.


<br>

@ciatph <br>
**Date Created:** 20181001 <br>
**Date Modified:** 20181001 