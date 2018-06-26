# ZF2 Importer module
ZF2 module for PHP Importer library

## Installation

Install it with ``composer``
```sh
composer require popov/zfc-importer -o
```

> NOTE: with 1.x we dropped support for other installation technics. Especially the ZF2 autoloading was dropped. You just need to switch to composer installation, which will make your life easier, since it comes with all needed features

Add `Popov\ZfcImporter` to your `config/modules.config.php`

## Usage
### Basic usage
See file example [here](https://github.com/agerecompany/php-importer/blob/dev/README.md#example-import-file).

Create new module and add import configuration
```php
// module/Popov/Discount/config/module.config.php
namespace Popov\Discount;

return [
  'importer' => require_once(__DIR__ . '/importer.config.php'),
]
```

```php
// module/Popov/Discount/config/importer.config.php
namespace Popov\Discount;

return [
    'tasks' => [
        __NAMESPACE__ . '\\Card' => [ // on the inner level will be converted to "popov-discount-card"
            'driver' => 'libxl',
            'fields_map' => [
                [
                    'Nominal' => ['name' => 'discount', '__filter' => ['percentToInt']],
                    'Serial' => 'serial',
                    '__table' => 'discount_card',
                    '__codename' => 'discount',
                    '__identifier' => 'code',
                    '__exclude' => false,
                ],
            ],
        ],
    ],
];
```

Now you can go to http://example.com/importer/import/type/popov-discount-card and select file for import.
As you can see ```/type/popov-discount-card``` in url will be converted to ```Popov\Discount\Card```  that correspond ```__NAMESPACE__ . '\\Card'``` key in configuration.
