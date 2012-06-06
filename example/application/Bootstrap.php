<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	protected function _initAutoload()
	{
		$autoloader = Zend_Loader_Autoloader::getInstance();
		
		// Rewriting mapper basepath
		$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
        	'basePath'      => APPLICATION_PATH,
          	'namespace'     => '',
          	'resourceTypes' => array(
				'mappers' => array(
					'path'      => 'models/Mapper',
					'namespace' => 'Model_Mapper',
				),          
		)));
		
		$autoloader->pushAutoloader( $resourceLoader );
		
		//Module autoloader
		$moduleAutoloader = new Zend_Application_Module_Autoloader(array(
			'namespace' => '', 
			'basePath' => APPLICATION_PATH
		));
		
		$autoloader->pushAutoloader( $moduleAutoloader );
	}
	

	protected function _initLayout()
	{	
		Zend_Layout::startMvc(APPLICATION_PATH . '/layouts/scripts');
	}

	
	protected function _initCompressorHead()
	{
		require_once 'G2/Compressor/Head.php';
	}
}