<?php
return array(
		'controllers' => array(
				'invokables' => array(
						'Gentile\Controller\Gentile' => 'Gentile\Controller\GentileController',
				),
		),
		//
		// The following section is new and should be added to your file
		'router' => array(
				'routes' => array(
						'gentile' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/gentile[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'Gentile\Controller\Gentile',
												'action'     => 'index',
										),
								),
						),
				),
		),
		
		'view_manager' => array(
				'template_path_stack' => array(
						'gentile' => __DIR__ . '/../view',
				),
		),
		);