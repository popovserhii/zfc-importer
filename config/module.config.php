<?php
namespace Agere\ZfcImporter;

return [
    'importer' => [
        'file_upload_path' => getcwd() . '/public/uploads/importer/'
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
