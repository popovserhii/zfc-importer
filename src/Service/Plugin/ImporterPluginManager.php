<?php
/**
 * Importer Plugin Manager
 *
 * @category Popov
 * @package Popov_Importer
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 05.04.17 23:47
 */
namespace Popov\ZfcImporter\Service\Plugin;

use Zend\Stdlib\Exception;
use Zend\ServiceManager\AbstractPluginManager;

class ImporterPluginManager extends AbstractPluginManager
{
    public function validate($plugin)
    {
        return true;

        if ($plugin instanceof ImporterPluginInterface
            || in_array($class = get_class($plugin), $this->invokableClasses)
            || in_array($class, $this->factories)
        ) {
            // we're okay
            return;
        }
        throw new Exception\RuntimeException(sprintf(
            'Plugin of type %s is invalid; must implement %s\ImporterPluginInterface',
            (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
            __NAMESPACE__
        ));
    }
}
