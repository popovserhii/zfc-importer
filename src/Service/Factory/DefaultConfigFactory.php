<?php
/**
 * @category Agere
 * @package Agere_Importer
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 07.04.2017 17:01
 */
namespace Agere\ZfcImporter\Service\Factory;

use Psr\Container\ContainerInterface;

class DefaultConfigFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return $container->getServiceLocator()->get('Config');
    }
}