<?php

	//Php 5.3 manual timezone
	date_default_timezone_set('Europe/Belgrade');

	ini_set('session.name', 'COMPRESSOR');
	ini_set('magic_quotes_gpc', 'Off');

	// Define path to application directory
	defined( 'APPLICATION_PATH' )
	    || define( 'APPLICATION_PATH', realpath(dirname( __FILE__ ) . '/../application' ) );
	
	    
	// Define application environment
	defined( 'APPLICATION_ENV' )
	    || define( 'APPLICATION_ENV', ( getenv( 'APPLICATION_ENV' ) ? getenv( 'APPLICATION_ENV' ) : 'production' ) );
	
	// Ensure library/ is on include_path
	set_include_path( implode( PATH_SEPARATOR, array(
	    realpath( APPLICATION_PATH . '/../../' ), //just for Compressor sample app
	    get_include_path(),
	)));
	
	/** Zend_Application */
	require_once 'Zend/Application.php';
	
	// Create application, bootstrap, and run
	$application = new Zend_Application(
	    APPLICATION_ENV,
	    APPLICATION_PATH . '/configs/application.ini'
	);
	$application->bootstrap()
	            ->run();