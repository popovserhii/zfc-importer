<?php
/**
 * Importer Plugin Provider Interface
 *
 * @category Popov
 * @package Popov_Importer
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 05.04.2017 22:50
 */

namespace Popov\ZfcImporter\Service\Plugin;

interface ImporterPluginProviderInterface {

	/**
	 * Expected to return \Zend\ServiceManager\Config object or array to
	 * seed such an object.
	 *
	 * @return array|\Zend\ServiceManager\Config
	 */
	public function getImporterPluginConfig();

}