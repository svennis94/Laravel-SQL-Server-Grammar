# Laravel SQL Server Grammar

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.txt)
[![Total Downloads][ico-downloads]][link-downloads]

This package optimizes the SQL Server driver from Laravel to optimize your SQL Server performance. 

## Install

Via Composer

``` bash
$ composer require sebudesign/laravel-sql-server-grammar
```

Once composer has been updated and the package has been installed, the service provider will need to be loaded.

For Laravel 4, open `app/config/app.php` and add following line to the providers array:

``` php
'SeBuDesign\SqlServerGrammar\SqlServerGrammarServiceProvider',
```

For Laravel 5, open `config/app.php` and add following line to the providers array:
``` php
SeBuDesign\SqlServerGrammar\SqlServerGrammarServiceProvider::class,
```

For Lumen 5, open `bootstrap/app.php` and add following line under the "Register Service Providers" section:
``` php
$app->register(SeBuDesign\SqlServerGrammar\SqlServerGrammarServiceProvider::class);
```

## Usage

Once you included the service provider the Laravel/Lumen will start using the custom grammar.

## Contributing

Contributions are very welcome. Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email sven@sebudesign.nl instead of using the issue tracker.

## Credits

- [Sven Buijsrogge][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.txt) for more information.

[ico-version]: https://img.shields.io/packagist/v/sebudesign/laravel-sql-server-grammar.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sebudesign/laravel-sql-server-grammar.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/sebudesign/laravel-sql-server-grammar
[link-downloads]: https://packagist.org/packages/sebudesign/laravel-sql-server-grammar
[link-author]: https://github.com/SeBuDesign
[link-contributors]: ../../contributors