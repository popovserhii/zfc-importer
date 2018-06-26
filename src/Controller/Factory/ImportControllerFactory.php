<?php
/**
 * Import Controller Factory
 *
 * @category Popov
 * @package Popov_ZfcImporter
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 04.04.2016 0:19
 */
namespace Popov\ZfcImporter\Controller\Factory;

use Popov\ZfcImporter\Controller\ImportController;
use Popov\ZfcImporter\Form\ImportForm;
use Popov\Importer\DriverCreator;
use Popov\Importer\Importer;
use Popov\Db\Db;

class ImportControllerFactory
{
    public function __invoke($cm)
    {
        $sm = $cm->getServiceLocator();
        $fm = $sm->get('FormElementManager');

        $db = $sm->has('Popov\Db')
            ? $sm->get('Popov\Db')
            : (new Db())->setPdo($sm->get('Doctrine\ORM\EntityManager')->getConnection());


        $config = $sm->get('Config');
        $importerContainer = $sm->get('ImporterPluginManager');
        $factory = new DriverCreator($config['importer'], $importerContainer);
        $importer = new Importer($factory, $db);

        /** @var ImportForm $form */
        $form = $fm->get(ImportForm::class);

        $controller = new ImportController($importer, $form);

        return $controller;
    }
}