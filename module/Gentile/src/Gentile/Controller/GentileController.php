<?php
namespace Gentile\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

 class GentileController extends AbstractActionController
 {
 	
 	protected $gentileTable;
 	
	 	public function getGentileTable()
	 	{
	 	
	 		if (!$this->gentileTable) {
	 			$sm = $this->getServiceLocator();
	 			$this->gentileTable = $sm->get('Gentile\Model\GentileTable');
	 		}
	 		return $this->gentileTable;
	 	}
	 	
	 	public function indexAction()
	 	{
	 		return new ViewModel(array(
	 				'gentileV' => $this->getGentileTable()->fetchAll(),
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