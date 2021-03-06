# Laravel SQL Server Extender

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.txt)
[![Total Downloads][ico-downloads]][link-downloads]

This package extend the SQL Server driver from Laravel to fix the migration error due to using custom schema  name and support sql server spatial

## Install

Via Composer

``` bash
$ composer require AymanElarian/laravel-sqlserver-extender
```

Once composer has been updated and the package has been installed, the service provider will need to be loaded.


For Laravel 5, open `config/app.php` and add following line to the providers array:
``` php
AymanElarian\Extensions\SqlServer\SpatialServiceProvider::class,
```

For Lumen 5, open `bootstrap/app.php` and add following line under the "Register Service Providers" section:
``` php
$app->register(AymanElarian\Extensions\SqlServer\SpatialServiceProvider::class);
```

For Laravel 4, open `app/config/app.php` and add following line to the providers array:

``` php
'AymanElarian\Extensions\SqlServer\SpatialServiceProvider',
```



## TO DO : Development plan

- [x] overwrite sql server grammer (compileTableExists method)  to search by schema name
- [x] refactor grimzy's Laravel mysql-spatial package to work with sql server
- [x] support points in sql server 
- [x] support polygon in sql server 
- [ ] support all other types in sql server 
- [ ] fix all test cases to run with sql server



## Usage

Once you included the service provider the Laravel/Lumen will start using the custom grammar.

## Contributing

Contributions are very welcome. Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## License

The MIT License (MIT). Please see [License File](LICENSE.txt) for more information.


[ico-version]: https://img.shields.io/packagist/v/aymanelarian/laravel-sqlserver-extender.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/aymanelarian/laravel-sqlserver-extender.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/aymanelarian/laravel-sqlserver-extender
[link-downloads]: https://packagist.org/packages/aymanelarian/laravel-sqlserver-extender


## Credits

Originally inspired and code refactored from [grimzy's Laravel mysql-spatial package](https://github.com/grimzy/laravel-mysql-spatial).



