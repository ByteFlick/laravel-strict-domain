<p align="center"><img src="https://github.com/ByteFlick/.github/blob/main/profile/btye-flick-logo.png?raw=true" width="400"></p>

# Strict Domain Checking for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ByteFlick/laravel-strict-domain.svg?style=flat-square)](https://packagist.org/packages/byteflick/laravel-strict-domain)
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

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-strict-domain-config"
```

This is the contents of the published config file:

```php
return [
    'domain' => env('APP_DOMAIN', 'http://localhost'),
];
```

## Usage

### Step 1: Configure the Environment

You need to add an environment variable called `APP_DOMAIN` to your localhost.
The value of this variable is used for checking the desired domain name against the one in the incoming request.

```php
APP_DOMAIN=localhost
```

### Step 2: Apply the Middleware

#### On Specific Routes Only

You can add the middleware to individual routes or apply it as a route group as well.

#### Globally For Laravel 11

Append the middleware to your default middlewares into your `bootstrap/app.php` via the code below.

```php
->withMiddleware(function (Middleware $middleware) {
     $middleware->append(CheckDomain::class);
})
```

#### Globally For Laravel 10

Add the middleware to your middlewares into your `App\Http\Kernel.php` via the code below.

```php
protected $middleware = [
        \ByteFlick\LaravelStrictDomain\Middlewares\CheckDomain::class,
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
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
