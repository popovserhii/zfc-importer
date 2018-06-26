<?php
/**
 * General import form
 *
 * @category Popov
 * @package Popov_ZfcImporter
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 16.01.2016 17:09
 */
namespace Popov\ZfcImporter\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class ImportForm extends Form implements InputFilterProviderInterface {

	public function init() {
		$this->setName('importer')
			->setAttribute('method', 'post')
			->setAttribute('enctype','multipart/form-data')
		;

		// Add the import fieldset, and set it as the base fieldset
		/*$this->add([
			'name' => 'spare-import',
			'type' => 'Popov\Spare\Form\ImportFieldset',
			'options' => [
				'use_as_base_fieldset' => true,
			],
		]);*/

		$this->add([
			'name' => 'type',
			'type' => 'hidden',
		]);

		$this->add([
			'name' => 'fileupload',
			'attributes' => [
				'type' => 'file',
				'class' => 'form-control',
				'style' => 'max-width:400px',
				'placeholder' => 'Select uploading file...',
			],
			'options' => [
				'label' => 'File Upload',
				'column-size' => 'md-12',
				'label_attributes' => ['class' => 'col-sm-12'],
			],
		]);

		//$this->add([
		//	'type' => 'Zend\Form\Element\Csrf',
		//	'name' => 'csrf'
		//]);

		$this->add([
			'name' => 'submit',
			'attributes' => [
				'type' => 'submit',
				'value' => 'Send',
				'class' => 'btn btn-primary btn-xs',
			]
		]);
	}

	/**
	 * Should return an array specification compatible with
	 * {@link Zend\InputFilter\Factory::createInputFilter()}.
	 *
	 * @return array
	 */
	public function getInputFilterSpecification() {
		return [
			'fileupload' => [
				'required' => true,
				/*'filters' => [
					['name' => 'StripTags'],
					['name' => 'StringTrim'],
				],*/
				/*'validators' => [
					[
						'name' => 'DoctrineModule\Validator\NoObjectExists',
						'options' => [
							'object_repository' => $this->getObjectManager()->getRepository('Popov\Project\Document\Project'),
							'fields' => 'code',
							'messages' => [
								'objectFound' => 'Sorry, a project with this code already exists!'
							],
						]
					]
				]*/
			],
		];
	}

}