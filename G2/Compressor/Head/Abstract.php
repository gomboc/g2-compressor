<?php 

abstract class My_Head_Abstract
{
	
	protected $_layout;
	
	protected $_view;
	
	
	public function __construct()
	{
		$this->_layout = Zend_Layout::getMvcInstance();
		
		$this->_view = $this->_layout->getView();
	}
	
			
	public function append( $property ) 
	{
		if ( $property instanceof SimpleXMLElement ) {

			if ( !empty( $property->files ) ) {
				
				foreach ( $property->files->file as $file ) {
				
					$this->_doAppend( str_replace( $property->destination, "/{$property->type}/", $file ) );
				}
			}
		} elseif ( is_string( $property ) ) {
			
			$this->_doAppend( $property );
		}		
	}
	
	
	protected abstract function _doAppend( $fileName );
}