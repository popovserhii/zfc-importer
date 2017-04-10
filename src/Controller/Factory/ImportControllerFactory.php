<?php
/**
 * Import Controller Factory
 *
 * @category Agere
 * @package Agere_ZfcImporter
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 04.04.2016 0:19
 */
namespace Agere\ZfcImporter\Controller\Factory;

use Agere\ZfcImporter\Controller\ImportController;
use Agere\ZfcImporter\Form\ImportForm;
use Agere\Importer\DriverFactory;
use Agere\Importer\Importer;
use Agere\Db\Db;

class ImportControllerFactory
{
    public function __invoke($cm)
    {
        $sm = $cm->getServiceLocator();
        $fm = $sm->get('FormElementManager');

        $db = $sm->has('Agere\Db')
            ? $sm->get('Agere\Db')
            : (new Db())->setPdo($sm->get('Doctrine\ORM\EntityManager')->getConnection());


        $config = $sm->get('Config');
        $importerContainer = $sm->get('ImporterPluginManager');
        $factory = new DriverFactory($config['importer'], $importerContainer);
        $importer = new Importer($factory, $db);

        /** @var ImportForm $form */
        $form = $fm->get(ImportForm::class);

        $controller = new ImportController($importer, $form);

        return $controller;
    }
}