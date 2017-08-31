# Changelog

All notable changes to `laravel-referer` will be documented in this file

## Unreleased

- make compatible with Laravel 5.5

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
