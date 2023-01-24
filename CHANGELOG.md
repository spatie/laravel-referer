# Changelog

All notable changes to `laravel-referer` will be documented in this file

## 1.8.1 - 2023-01-24

### What's Changed

- Add PHP 8.2 Support by @patinthehat in https://github.com/spatie/laravel-referer/pull/46
- Laravel 10.x Compatibility by @laravel-shift in https://github.com/spatie/laravel-referer/pull/47

**Full Changelog**: https://github.com/spatie/laravel-referer/compare/1.8.0...1.8.1

## 1.8.0 - 2022-01-13

## What's Changed

- Fix use statement in the code example for "Forgetting or manually setting the referer" documentation section by @vurpa in https://github.com/spatie/laravel-referer/pull/41
- Add PHP 8.1 Support by @patinthehat in https://github.com/spatie/laravel-referer/pull/42
- Add Laravel 9 support

## New Contributors

- @vurpa made their first contribution in https://github.com/spatie/laravel-referer/pull/41
- @patinthehat made their first contribution in https://github.com/spatie/laravel-referer/pull/42

**Full Changelog**: https://github.com/spatie/laravel-referer/compare/1.7.3...1.8.0

## 1.7.3 - 2021-05-07

- fix laravel-referer 1.7.2 on Laravel 7.30.4 (#39)

## 1.7.2 - 2021-04-06

- prep for Octane (#37)

## 1.7.1 - 2021-01-15

- add support for PHP 8

## 1.7.0 - 2020-09-08

- add support for Laravel 8

## 1.6.1 - 2020-07-14

- fixes bug with null values for session key arg in Referer class constructor (#30)

## 1.6.0 - 2020-03-03

- add support for Laravel 7

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
