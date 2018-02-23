PHP csv builder 
===============

[![GitHub issues](https://img.shields.io/github/issues/Silverkron/php-csv-builder.svg)](https://github.com/Silverkron/php-csv-builder/issues)
[![GitHub forks](https://img.shields.io/github/forks/Silverkron/php-csv-builder.svg)](https://github.com/Silverkron/php-csv-builder/network)
[![GitHub license](https://img.shields.io/github/license/Silverkron/php-csv-builder.svg)](https://github.com/Silverkron/php-csv-builder/blob/master/LICENSE)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/Silverkron/php-csv-builder.svg?style=social)](https://twitter.com/intent/tweet?text=Wow:&url=https%3A%2F%2Fgithub.com%2FSilverkron%2Fphp-csv-builder)

Build csv file and save or download it. Simple librery to write csv file in your php application


Install
-------

Install `php-csv-builder` with Composer.

```
$ composer require silverkron/php-csv-builder
```

Initialize the class
-------

```php
use CsvBuilder\CsvBuilder;

$csvBuilder = new CsvBuilder();
```

Available methods
-----------------

### Change default destination path

`setFilePath(<string>)`

```php
$csvBuilder->setFilePath('/path/to/file');
```

### Change default file name

`setFileName(<string>)`

```php
$csvBuilder->setFileName('/path/to/file');
```

### Set row of titles **(required)**

`setTitles(<array>)`

```php
$csvBuilder->setTitles([
   'Title 1',
   'Title 2',
   'Title 3',
   'Title 4'
]);
```

### Clear all rows

`clearRows(<array>)`

```php
$csvBuilder->clearRows();
```

### Add new row **(required)**

`addRow(<array>)`

```php
$csvBuilder->addRow([
    'Column 1',
    'Column 2',
    'Column 3',
    'Column 4',
]);
```

### Build the csv file **(required for download)**

`create()`

```php
$csvBuilder->create();
```

### Download csv file

`download()`

```php
$csvBuilder->download();
```

License
-------

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.

[PSR-2]: http://www.php-fig.org/psr/psr-2/
[PSR-4]: http://www.php-fig.org/psr/psr-4/
