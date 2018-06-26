<?php
/**
 * Import fieldset
 *
 * @category Popov
 * @package Popov_ZfcImporter
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 26.09.14 15:31
 */
namespace Popov\ZfcImporter\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class ImportFieldset extends Fieldset implements InputFilterProviderInterface {


	public function init() {
		$this->setName('importer');

		$this->add([
			'name' => 'type',
			'type' => 'hidden',
			//'attributes' => [
				//'type' => 'file',
				//'class' => 'form-control',
				//'style' => 'max-width:400px',
				//'placeholder' => 'Select uploading file...',
			//],
			//'options' => [
			//	'label' => 'Quantity',
				//'column-size' => 'md-12',
				//'label_attributes' => ['class' => 'col-sm-12'],
			//],
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