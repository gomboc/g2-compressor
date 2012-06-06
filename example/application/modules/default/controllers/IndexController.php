<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
       
    }

    public function indexAction()
    {			
    	$head = G2_Compressor_Head::getInstance();
    	
		$head->appendCss( 'comp' );

		$head->appendJavaScipt( 'comp' );
    }
}