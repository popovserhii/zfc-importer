# ZF2 Importer module
ZF2 module for PHP Importer library

## Installation

Install it with ``composer``
```sh
composer require agerecompany/zfc-importer -o
```

> NOTE: with 1.x we dropped support for other installation technics. Especially the ZF2 autoloading was dropped. You just need to switch to composer installation, which will make your life easier, since it comes with all needed features

Add `Agere\ZfcImporter` to your `config/application.config.php`

## Usage
### Basic usage
See file example [here](https://github.com/agerecompany/php-importer/blob/dev/README.md#example-import-file).

Create new module and add import configuration
```php
// module/Agere/Discount/config/module.config.php
namespace Agere\Discount;

return [
  'importer' => require_once(__DIR__ . '/importer.config.php'),
]
```

```php
// module/Agere/Discount/config/importer.config.php
namespace Agere\Discount;

return [
    'tasks' => [
        __NAMESPACE__ . '\\Card' => [
            'driver' => 'libxl',
            'fields_map' => [
                [
                    'Номінал' => ['name' => 'discount', '__filter' => ['percentToInt']],
                    'Серія' => 'serial'
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

Now you can go to http://example.com/importer/import/type/agere-discount-card and select file for import.
You can see ```/type/agere-discount-card``` in url will be converted to ```Agere\Discount\Card```  that correspond ```__NAMESPACE__ . '\\Card'``` key in configuration.
