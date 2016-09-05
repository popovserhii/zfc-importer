<?php
// @link http://adam.lundrigan.ca/2012/07/quick-and-dirty-zf2-zend-navigation/
// All navigation-related configuration is collected in the 'navigation' key
return [
    // The DefaultNavigationFactory we configured in (1) uses 'default' as the sitemap key
    'default' => [
        // And finally, here is where we define our page hierarchy
        'cart' => [
            'module' => 'importer',
            'label' => 'Главная',
            'route' => 'default',
            'controller' => 'index',
            'action' => 'index',
            'pages' => [
                'importer' => [
                    'label' => 'Импорт',
                    'route' => 'default',
                    'controller' => 'importer',
                    'action' => 'import',
                    'pages' => [
                        'checkout-booking' => [
                            'label' => 'Заявка',
                            'route' => 'default/id',
                            'controller' => 'cart',
                            'action' => 'checkout-view',
                        ],
                    ],
                ],
                'importer-wildcard' => [
                    'label' => 'Импорт',
                    'route' => 'default/wildcard',
                    'controller' => 'importer',
                    'action' => 'import',
                    'pages' => [
                        'checkout-booking' => [
                            'label' => 'Заявка',
                            'route' => 'default/id',
                            'controller' => 'cart',
                            'action' => 'checkout-view',
                        ],
                    ],
                ],
            ],
        ],
    ],
];