# Remember a visitor's original referer

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-referer.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-referer)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/spatie/laravel-referer/master.svg?style=flat-square)](https://travis-ci.org/spatie/laravel-referer)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/fd60d7c2-ee49-4a82-adfd-00b7f5c55406.svg?style=flat-square)](https://insight.sensiolabs.com/projects/fd60d7c2-ee49-4a82-adfd-00b7f5c55406)
[![Quality Score](https://img.shields.io/scrutinizer/g/spatie/laravel-referer.svg?style=flat-square)](https://scrutinizer-ci.com/g/spatie/laravel-referer)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-referer.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-referer)

Remember a visitor's original referer in session. The referer is (highest priority first):

- The `utm_source` query parameter
- The domain from the request's `Referer` header if there's an external host in the URL
- Empty

## Postcardware

You're free to use this package (it's [MIT-licensed](LICENSE.md)), but if it makes it to your production environment we highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.

Our address is: Spatie, Samberstraat 69D, 2060 Antwerp, Belgium.

The best postcards will get published on the open source page on our website.

## Installation

You can install the package via composer:

``` bash
composer require spatie/laravel-referer
```

You'll need to register the service provider:

```php
// config/app.php

'providers' => [
    // ...
    Spatie\Referer\RefererServiceProvider::class,
];
```

You can optionally register the facade:

```php
// config/app.php

'aliases' => [
    // ...
   'Referer' => Spatie\Referer\Facades\Referer::class,
];
```

You can publish the config file with:

```
php artisan vendor:publish --provider="Spatie\Referer\RefererServiceProvider"
```

Publishing the config file is only necessary if you'd want to change the key in which the referer is stored in the session.

```
return [

    /*
     * The key that will be used to remember the referer in the session.
     */
    'key' => 'referer',

];
```

## Usage

To capture the referer, all you need to do is add the `Spatie\Referer\CaptureReferer` middleware to your middleware stack. In most configuration's, you'll only want to capture the referer in "web" requests, so it makes sense to register it in the `web` stack. Make sure it comes **after** Laravel's `StartSession` middleware!

```php
// app/Http/Kernel.php

protected $middlewareGroups = [
    'web' => [
        // ...
        \Illuminate\Session\Middleware\StartSession::class,
        // ...
        \Spatie\Referer\CaptureReferer::class,
        // ...
    ],
    // ...
];
```

The easiest way to retrieve the referer is by using the facade:

```php
use Referer;

$referer = Referer::get(); // 'google.com'
```

The captured referer is (from high to low priority):

- The `utm_source` query parameter, or:
- The domain from the request's `Referer` header if there's an external host in the URL, or:
- Empty

An empty referer will never overwrite an exisiting referer. So if a visitor comes from google.com and visits a few pages on your site, those pages won't affect the referer since local hosts are ignored.

### Forgetting or manually setting the referer

The `Referer` class provides dedicated methods to forget, or manually set the referer.

```php
use Referer;

Referer::set('google.com');
Referer::get(); // 'google.com'
Referer::forget();
Referer::get(); // ''
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Credits

- [Sebastian De Deyne](https://github.com/sebastiandedeyne)
- [All Contributors](../../contributors)

## About Spatie

Spatie is a webdesign agency based in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
