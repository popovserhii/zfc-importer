<?php
namespace Popov\ZfcImporter\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\File\Transfer\Adapter\Http;
use Popov\ZfcImporter\Form\ImportForm;
use Popov\Importer\Importer;

class ImportController extends AbstractActionController {

    /** @var ImportForm */
    protected $form;

    /** @var Importer */
    protected $importer;

    public function __construct(Importer $importer, $form)
    {
        $this->importer = $importer;
        $this->form = $form;
    }

	public function importAction()
    {
        $request = $this->getRequest();
        $this->form->get('type')->setValue($this->params('type'));

		if ($request->isPost()) {
			$nonFile = $request->getPost()->toArray();
			$file = $this->params()->fromFiles('fileupload');
			$data = array_merge($nonFile, ['fileupload' => $file['name']]);
			//set data post and file ...
            $this->form->setData($data);
			if ($this->form->isValid()) {
				//$size = new Size(array('max' => '204800B')); //minimum bytes filesize
				$adapter = new Http();
				//$adapter->setValidators(array($size), $file['name']);

				if (!$adapter->isValid()) {
					$dataError = $adapter->getMessages();
					$error = array();
					foreach ($dataError as $key => $row) {
						$error[] = $row;
					}
                    $this->form->setMessages(['fileupload' => $error]);
				} else {
                    $pathUploadFiles = $this->importer->getDriverCreator()->getConfig()['file_upload_path'];
					if (!is_dir($pathUploadFiles)) {
						mkdir($pathUploadFiles, 0775, true);
					}
					$adapter->setDestination($pathUploadFiles);
					//\Zend\Debug\Debug::dump([$adapter->getFileName($file['name'])]); die(__METHOD__);

					/*\Zend\Debug\Debug::dump([
						$file['name'],
						$adapter->receive($adapter->getFileName('fileupload', false)),
						$adapter->isFiltered($file['name']),
						$adapter->getMessages()
					]); die(__METHOD__.__LINE__);*/

					//$fileName = $adapter->getFileName('fileupload', false);
					if ($adapter->receive($adapter->getFileName('fileupload', false))) {
                        $this->importer->import($this->params('type'), $adapter->getFileName('fileupload'));

                        $this->prepareMessages();
					}
				}
			}
		}

		//\Zend\Debug\Debug::dump([$form->getName(), get_class($form)]); die(__METHOD__);
		return [
			'form' => $this->form,
		];
	}

    public function importLiteAction()
    {
        //$request = $this->getRequest();
        //$this->form->get('type')->setValue($this->params('type'));

        //\Zend\Debug\Debug::dump([$this->params('type'), $this->params('source')]); die(__METHOD__);

        //if ($request->isPost()) {
            $this->importer->import($this->params('type'), $this->params('source'));
            $this->prepareMessages();
        //}
    }

    protected function prepareMessages()
    {
        $flash = $this->flashMessenger();
        foreach ($this->importer->getMessages() as $namespace => $messages) {
            foreach ($messages as $message) {
                $flash->setNamespace($namespace)->addMessage($message);
            }
        }
    }
}
