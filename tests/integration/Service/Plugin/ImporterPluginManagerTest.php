<?php
/**
 * Importer Container Test
 *
 * @category Agere
 * @package Agere_ZfcImporter
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 07.04.2017 16:54
 */
namespace AgereTest\ZfcImporter\Factory;

use Mockery;
use Zend\Stdlib\Exception;
use PHPUnit_Framework_TestCase as TestCase;
use AgereTest\ZfcImporter\Bootstrap;
use Agere\Importer\Driver\Soap;

class ImporterPluginManagerTest extends TestCase
{
    protected $container;

    protected function tearDown()
    {
        Mockery::close();
    }

    public function testIfContainerContainConfig()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $importerContainer = $serviceManager->get('ImporterPluginManager');

        $this->assertTrue($importerContainer->has('Config'));
    }

    public function testCorrectCreateSoapDriver()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $importerContainer = $serviceManager->get('ImporterPluginManager');

        $this->assertTrue($importerContainer->has('SoapDriver'));
        $this->assertTrue($importerContainer->has(Soap::class));
        $this->assertInstanceOf(Soap::class, $importerContainer->get(Soap::class));
    }
}
