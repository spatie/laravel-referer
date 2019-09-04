# Changelog

All notable changes to `laravel-referer` will be documented in this file

## 1.5.0 - 2019-09-04

- add support for Laravel 6

## 1.4.0 - 2019-02-27

- drop support for PHP 7.1 and below
- drop support for Laravel 5.8 and below

## 1.3.4 - 2019-02-27

- add support for Laravel 5.8

## 1.3.3 - 2018-08-29

- add support for Laravel 5.7

## 1.3.2 - 2018-05-14
- Ensure `UtmSource` always returns a referer string

## 1.3.1 - 2018-02-08
- Make compatible with Laravel 5.6
- Make compatible with phpunit 7

## 1.3.0 - 2017-08-31
- Make compatible with Laravel 5.5

## 1.2.1 - 2017-02-12
- Fixed: publishing of config file

## 1.2.0 - 2017-02-08
- **Breaking**: Sources are now configured via `Source` implementations
- **Breaking**: The configuration key `referer.key` has been renamed to `referer.session_key`

## 1.1.1 - 2017-02-07
- Fixed: Fixed a regression that was introduced in 1.1.0

## 1.1.0 - 2017-02-07
- Added: You can now configure which sources you want to use to capture a referer (currently `utm_source` and `referer_header`)

## 1.0.0 - 2017-01-06
- Initial release
