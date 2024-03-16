<p align="center"><img src="https://github.com/ByteFlick/.github/blob/main/profile/btye-flick-logo.png?raw=true" width="400"></p>

# Strict Domain Checking for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ByteFlick/laravel-strict-domain.svg?style=flat-square)](https://packagist.org/packages/byteflick/laravel-strict-domain)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ByteFlick/laravel-strict-domain/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ByteFlick/laravel-strict-domain/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ByteFlick/laravel-strict-domain/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/byteflick/laravel-strict-domain/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ByteFlick/laravel-strict-domain.svg?style=flat-square)](https://packagist.org/packages/byteflick/laravel-strict-domain)

Strict Domain Checking for Laravel is a lightweight package designed to seamlessly integrate with Laravel
applications, providing a simple solution for domain-based redirection. With this package, you can ensure that incoming
traffic to your Laravel application is redirected to a specified domain if the requesting domain doesn't match the
configured domain. By implementing a customizable middleware, developers can easily enforce domain consistency,
enhancing security and user experience. Whether managing multiple domains or enforcing branding standards, this package
offers a flexible and efficient solution for domain redirection within Laravel applications.

## Installation

You can install the package via composer:

```bash
composer require byteflick/laravel-strict-domain
```

You can publish the config file with (Optional):

```bash
php artisan vendor:publish --tag="laravel-strict-domain-config"
```

This is the contents of the published config file:

```php
return [
    'domain' => env('APP_DOMAIN', 'localhost.com'),
];
```

## Usage

### Step 1: Configure the Environment

You need to add an environment variable called `APP_DOMAIN` to your `.env` file. The value of this variable is used 
for validating the incoming traffic.

```php
APP_DOMAIN=localhost.com
```

### Step 2: Apply the Middleware

#### 2.1 Redirecting External Traffic

If you want to redirect incoming traffic to your application from other domain/hosts to your own then you can
use `RedirectExternalTraffic` middleware. This is useful when you want to redirect all the traffic from `johndoe.com` (
referrer domain) and other domains/hosts to `janedoe.com` (your designated domain).

##### On Specific Routes Only

You can add the middleware to individual routes or apply it via a route group.

##### Globally For Laravel 11

Append the middleware to your default middlewares into your `bootstrap/app.php` via the code below to redirect all
external traffic outside your designated host to your designated host.

```php
->withMiddleware(function (Middleware $middleware) {
     $middleware->append(\ByteFlick\LaravelStrictDomain\Middlewares\RedirectExternalTraffic::class);
})
```

##### Globally For Laravel 10

Add the middleware to your default middlewares into your `App\Http\Kernel.php` via the code below to redirect all
external traffic outside your designated host to your designated host.

```php
protected $middleware = [
    \ByteFlick\LaravelStrictDomain\Middlewares\RedirectExternalTraffic::class,
];
```

#### 2.2 Blocking External Traffic

If you want to block incoming traffic to your application from other domain/hosts to your own then you can
use `BlockExternalTraffic` middleware. This is useful when you want to allow traffic from `janedoe.com` but
block `johndoe.com` and others to your application.

##### On Specific Routes Only

You can add the middleware to individual routes or apply it via a route group.

##### Globally For Laravel 11

Append the middleware to your default middlewares into your `bootstrap/app.php` via the code below to block all
external traffic outside your designated host.

```php
->withMiddleware(function (Middleware $middleware) {
     $middleware->append(\ByteFlick\LaravelStrictDomain\Middlewares\BlockExternalTraffic::class);
})
```

##### Globally For Laravel 10

Add the middleware to your default middlewares into your `App\Http\Kernel.php` via the code below to block all
external traffic outside your designated host.

```php
protected $middleware = [
    \ByteFlick\LaravelStrictDomain\Middlewares\BlockExternalTraffic::class,
];
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ByteFlick](https://github.com/ByteFlick)
- [ORPtech](https://orptech.com)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
