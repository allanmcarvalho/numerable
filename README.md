# Numerable for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/allanmcarvalho/numerable.svg?style=flat-square)](https://packagist.org/packages/allanmcarvalho/numerable)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/allanmcarvalho/numerable/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/allanmcarvalho/numerable/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/allanmcarvalho/numerable/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/allanmcarvalho/numerable/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/allanmcarvalho/numerable.svg?style=flat-square)](https://packagist.org/packages/allanmcarvalho/numerable)
[![codecov](https://codecov.io/gh/allanmcarvalho/numerable/graph/badge.svg?token=Jz0e5EbT1d)](https://codecov.io/gh/allanmcarvalho/numerable)

This package provide a solution like Laravel strings utils classes. With it, you can do some cool stuffs in your numbers
like assert, modify, math operations, format and other things.

## Installation

You can install the package via composer:

```bash
composer require allanmcarvalho/numerable
```

## Basic usage
Numerable is like Laravel string utils classes. You can use Helper class or an instance from numerable.

```php
use Numerable\Numerable;
use Numerable\Number;

Number::add(2, 4, 6); // 12
Number::divide(100, 2); // 50
Number::multiply(2, 10, 5); // 100
Number::parse('21.32%'); // 21.32
Number::sub(20, 4, 1); // 15
Number::toCurrency(213.21); // $213.21
Number::toFloat(1_000); // 1000.0
Number::toInteger(23.21); // 23

//or 

$number = Number::from(10)
    ->add(2) // now is 12
    ->divide(2.5) // now is 4.8
    ->multiply(4) // now is 19.2
    ->sub(4); // now is 15.2
$number->toCurrency(); // $15.20
$number->toCurrency('BRL', 'pt_BR'); // R$15,20
$number->toFloat(); // 15.2
$number->toInteger(); // 15
    

```

## Available methods

- **add** - Add numbers. Available as static method and instance method.
- **divide** - Divide numbers. Available as static method and instance method.
- **multiply** - Multiply numbers. Available as static method and instance method.
- **parse** - Parse string to number. Available as static method.
- **sub** - Subtract numbers. Available as static method and instance method.
- **toCurrency** - Format number to currency. Available as static method and instance method.
- **toFloat** - Format number to float. Available as static method and instance method.
- **toInteger** - Format number to integer. Available as static method and instance method.



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
