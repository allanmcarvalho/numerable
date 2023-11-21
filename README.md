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
Number::equal(2.0, 2); // true
Number::equal(2.0, 2, strict: true); // false
Number::divide(100, 2); // 50
Number::gt(10, 11); // false
Number::gte(11.0, 11); // true
Number::lt(10, 11); // true
Number::lte(11.0, 11); // true
Number::multiply(2, 10, 5); // 100
Number::parse('21.32%'); // 21.32
Number::sub(20, 4, 1); // 15
Number::toCurrency(213.21); // $213.21
Number::toFloat(1_000); // 1000.0
Number::toInteger(23.21); // 23
Number::toOrdinal(1); // 1st
Number::toPercentage(0.52, precision: 0); // 52%
Number::toReadableSize(1024 * 1024 * 512); // 512MB

//or 

$number = Number::from(10)
    ->add(2) // now is 12
    ->divide(2.5) // now is 4.8
    ->multiplyBy(4) // now is 19.2
    ->sub(4); // now is 15.2
$number->equal(15.10); // false
$number->gt(10); // true
$number->gte(18); // false
$number->lt(10); // false
$number->lte(18); // true
$number->toCurrency(); // $15.20
$number->toCurrency('BRL', 'pt_BR'); // R$15,20
$number->toFloat(); // 15.2
$number->toFormat(places: 0, suffix: ' oranges'); // 15 oranges
$number->toInteger(); // 15
$number->toOrdinal(); // 15th
$number->toPercentage(sourceHumanized: true); // 15.00%
$number->toReadableSize(short: false); // 15.2 bytes
    

```

## Available methods

- **abs** - Get absolute value. Available as static method and instance method.
- **add** - Add numbers. Available as static method and instance method.
- **asHumanPercentage** - Format number to human percentage. Available only as instance method.
- **asFractionPercentage** - Format number to fraction percentage. Available only as instance method.
- **equal** - Compare numbers. Available as static method and instance method.
- **diff** - Get difference between numbers. Available as static method and instance method.
- **divide** - Divide numbers. Available as static method and instance method.
- **divideBy** - Divide an instance value by a divisor. Available as instance method.
- **gt** - Check if number is greater than another number. Available as static method and instance method.
- **gte** - Check if number is greater than or equal to another number. Available as static method and instance method.
- **isEven** - Check if number is even. Available as static method and instance method.
- **isFloat** - Check if number is float. Available as static method and instance method.
- **isInteger** - Check if number is integer. Available as static method and instance method.
- **isMultipleOf** - Check if number is multiple of another number. Available as static method and instance method.
- **isNegative** - Check if number is negative. Available as static method and instance method.
- **isOdd** - Check if number is odd. Available as static method and instance.
- **isPositive** - Check if number is positive. Available as static method and instance method.
- **lt** - Check if number is less than another number. Available as static method and instance method.
- **lte** - Check if number is less than or equal to another number. Available as static method and instance method.
- **multiply** - Multiply numbers. Available as static method.
- **multiplyBy** - Multiply number by another number. Available as instance method.
- **parse** - Parse string to number. Available as static method.
- **round** - Round number. Available as static method and instance method.
- **roundAsMultipleOf** - Round number as multiple of another number. Available as static method and instance method.
- **sub** - Subtract numbers. Available as static method and instance method.
- **takeAPart** - Take a part of number. Available as static method and instance method.
- **toCurrency** - Format number to currency. Available as static method and instance method.
- **toFloat** - Format number to float. Available as static method and instance method.
- **toFormatted** - Format number to formatted string. Available as static method and instance method.
- **toInteger** - Format number to integer. Available as static method and instance method.
- **toOrdinal** - Format number to ordinal. Available as static method and instance method.
- **toPercentage** - Format number to percent. Available as static method and instance method.
- **variation** - Get variation between numbers. Available as static method.
- **variationFrom** - Get variation from a base number. Available as instance method.
- **variationTo** - Get variation to a base number. Available as instance method.

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
