# Numerable for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/allanmcarvalho/numerable.svg?style=flat-square)](https://packagist.org/packages/allanmcarvalho/numerable)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/allanmcarvalho/numerable/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/allanmcarvalho/numerable/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/allanmcarvalho/numerable/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/allanmcarvalho/numerable/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/allanmcarvalho/numerable.svg?style=flat-square)](https://packagist.org/packages/allanmcarvalho/numerable)
[![Total Downloads](https://codecov.io/gh/WSS-Group/AllgaTrap/graph/badge.svg?token=IPbCkwoGFB)](https://codecov.io/gh/allanmcarvalho/numerable)

This package provide a solution like Laravel strings utils classes. With it, you can do some cool stuffs in your numbers
like assert, modify, math operations, format and other things.

## Installation

You can install the package via composer:

```bash
composer require allanmcarvalho/numerable
```

## Usage

```php
$numerable = new Numerable\Numerable();
echo $numerable->echoPhrase('Hello, Numerable!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Allan Mariucci Carvalho](https://github.com/allanmcarvalho)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
