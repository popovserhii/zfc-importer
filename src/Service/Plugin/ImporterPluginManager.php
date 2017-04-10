<?php
/**
 * Importer Plugin Manager
 *
 * @category Agere
 * @package Agere_Importer
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 05.04.17 23:47
 */
namespace Agere\ZfcImporter\Service\Plugin;

use Zend\Stdlib\Exception;
use Zend\ServiceManager\ConfigInterface;
use Zend\ServiceManager\AbstractPluginManager;

class ImporterPluginManager extends AbstractPluginManager
{
    /**
     * Default set of extension classes
     * Note: Use config notation for more flexibility
     *
     * @var array
     */
    protected $invokableClasses = [
        //'web-app' => 'Agere\Project\Service\Plugin\WebApp',
    ];

    public function validatePlugin($plugin)
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
