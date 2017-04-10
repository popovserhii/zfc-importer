<?php
namespace Agere\ZfcImporter;

use Agere\Importer\Driver;

return [
    'importer' => [
        'file_upload_path' => getcwd() . '/public/uploads/importer/'
    ],

    'importer_plugins' => [
        'aliases' => [
            'SoapDriver' => Driver\Soap::class,
            'SoapCombinedAdapter' => Driver\Adapter\SoapCombinedAdapter::class,
        ],
        'factories' => [
            'Config' => Service\Factory\DefaultConfigFactory::class,
            Driver\Soap::class => Driver\Factory\SoapFactory::class,
            Driver\Adapter\SoapCombinedAdapter::class => Driver\Factory\SoapCombinedAdapterFactory::class,
        ],
    ],

    'controllers' => [
        'aliases' => [
            'importer' => Controller\ImportController::class,
        ],
        'factories' => [
            Controller\ImportController::class => Controller\Factory\ImportControllerFactory::class,
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
