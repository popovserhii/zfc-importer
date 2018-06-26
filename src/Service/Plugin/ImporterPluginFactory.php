<?php
/**
 * Plugin Factory
 *
 * @category Popov
 * @package Popov_Importer
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 05.04.17 21:55
 */
namespace Popov\ZfcImporter\Service\Plugin;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

class ImporterPluginFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = ImporterPluginManager::class;
}