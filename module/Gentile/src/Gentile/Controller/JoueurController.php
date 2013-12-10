<?php
namespace Gentile\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class JoueurController extends AbstractActionController
{

	protected $joueurTable;

	public function getJoueurTable()
	{
		 
		if (!$this->joueurTable) {
			$sm = $this->getServiceLocator();
			$this->joueurTable = $sm->get('Gentile\Model\JoueurTable');
		}
		return $this->joueurTable;
	}
	 
	public function indexAction()
	{
		return new ViewModel(array(
				'gentileV' => $this->getJourTable()->fetchAll(),
		));
	}
		

	 

	public function addAction()
	{
	}

	public function editAction()
	{
	}

	public function deleteAction()
	{
	}
	 

	 
	 
	 
	 
	 
}