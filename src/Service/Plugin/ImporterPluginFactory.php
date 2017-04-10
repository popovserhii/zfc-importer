<?php
/**
 * Plugin Factory
 *
 * @category Agere
 * @package Agere_Importer
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 05.04.17 21:55
 */
namespace Agere\ZfcImporter\Service\Plugin;

use Interop\Container\ContainerInterface;
use Zend\Mvc\Service\AbstractPluginManagerFactory;

class ImporterPluginFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = ImporterPluginManager::class;

    /*public function __invoke(ContainerInterface $container, $name, array $options = null)
    {
        $importerManager = parent::__invoke($container, $name, $options);
        $importerManager->setService('Config', function() use ($container) {
            return $container->get('Config');
        });

        return $importerManager;
    }*/
}