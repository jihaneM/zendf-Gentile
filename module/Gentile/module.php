<?php
namespace Gentile;

// Add these import statements:
use Gentile\Model\Gentile;
use Gentile\Model\GentileTable;
use Gentile\Model\Joueur;
use Gentile\Model\JoueurTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module{
		
	public function getAutoloaderConfig(){
		return array(
					 'Zend\Loader\ClassMapAutoloader' => array(
						__DIR__ . '/autoload_classmap.php',
							),
							'Zend\Loader\StandardAutoloader' => array(
									'namespaces' => array(
											__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
									),
							),
					);
			}
			
	public function getConfig(){
					return include __DIR__ . '/config/module.config.php';
			}
			
     public function getServiceConfig()
     {
         return array(
             'factories' => array(
                     'Gentile\Model\GentileTable' =>  function($sm) {
                     $tableGateway = $sm->get('GentileTableGateway');
                     $table = new GentileTable($tableGateway);
                     return $table;
                 },
                     'GentileTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype -> setArrayObjectPrototype(new Gentile());
                     return new TableGateway('gentile', $dbAdapter, null, $resultSetPrototype);
                 },
                 
                 'Gentile\Model\JoueurTable' =>  function($sm) {
                 	$tableGateway = $sm->get('JoueurTableGateway');
                 	$table = new JoueurTable($tableGateway);
                 	return $table;
                 },
                 'JoueurTableGateway' => function ($sm) {
                 	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                 	$resultSetPrototype = new ResultSet();
                 	$resultSetPrototype -> setArrayObjectPrototype(new Joueur());
                 	return new TableGateway('joueur', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }