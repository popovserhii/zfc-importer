<?php
/**
 * Importer Container Test
 *
 * @category Popov
 * @package Popov_ZfcImporter
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 07.04.2017 16:54
 */
namespace PopovTest\ZfcImporter\Factory;

use Mockery;
use Zend\Stdlib\Exception;
use PHPUnit_Framework_TestCase as TestCase;
use PopovTest\ZfcImporter\Bootstrap;
use Popov\Importer\Driver\Soap;

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
