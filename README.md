# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/metadeck/nova-blog.svg?style=flat-square)](https://packagist.org/packages/metadeck/nova-blog)
[![Build Status](https://img.shields.io/travis/metadeck/blog/master.svg?style=flat-square)](https://travis-ci.org/metadeck/blog)
[![Quality Score](https://img.shields.io/scrutinizer/g/metadeck/blog.svg?style=flat-square)](https://scrutinizer-ci.com/g/metadeck/blog)
[![Total Downloads](https://img.shields.io/packagist/dt/metadeck/blog.svg?style=flat-square)](https://packagist.org/packages/metadeck/blog)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require metadeck/blog

php artisan vendor:publish --provider="Metadeck\NovaBlog\NovaBlogServiceProvider"

php artisan vendor:publish --provider="Spatie\Tags\TagsServiceProvider"

php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider"

php artisan migrate

```

## Usage

``` php
// Usage description here
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email declan at metadeck.io instead of using the issue tracker.

## Credits

- [Declan McDonough](https://github.com/metadeck)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
