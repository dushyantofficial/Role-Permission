<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Version Detail

#### PHP : 7.3 | 7.4

#### LARAVEL : 8.0

#### COMPOSER : 2.6

#### Database : Mysql | Maria DB 10.1

## Setup Laravel Step

- install composer
- php artisan storage:link (verify storage directory)
- composer require barryvdh/laravel-dompdf (pdf download command)
- composer require spatie/laravel-backup (project & sql zip generate)
- composer require mews/captcha (math captcha)
- composer require razorpay/razorpay (Razorpay Payment Gateway Integration)

- **Install Xampp Path Set** (path :- **role-permissions-blog\config\database.php**) // Project & Sql zip donwload
- 'dump' => [
  'dump_binary_path' => 'C:/Xampp/mysql/bin',
  'use_single_transaction' ,
  'timeout' => 60 * 5,
  ]

-**Add match captcha validation** (path :- **
role-permissions-blog\vendor\laravel\ui\auth-backend\AuthenticatesUsers.php**)
$request->validate([
$this->username() => 'required|string',
'password' => 'required|string',
'captcha' => 'required|captcha',
]);

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and
creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in
many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache)
  storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all
modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video
tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging
into our comprehensive video library.

