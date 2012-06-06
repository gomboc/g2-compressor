<?php 

class G2_Compressor_Head
{
	protected $_compressorProperties;
	
	protected $_head;
	
	protected $_properties = array();
	
	public function __construct()
	{
		
 		$this->_compressorProperties = APPLICATION_PATH . '/../yuic.properties.xml'; 
	}
	
	public function appendCss( $name )
	{
		$this->_head = new My_Head_Css();
		
		$this->_append( $name, 'css' );
		
		return $this;
	}
	
	public function appendJavaScipt( $name )
	{
		$this->_head = new My_Head_JavaScript();
		
		$this->_append( $name, 'js' );
		
		return $this;
	} 
	    
    private function _append( $name, $type )
    {
    	if ( APPLICATION_ENV == 'production' ) {
    		$this->_head->append( "/{$type}/{$name}.min.{$type}" );
    		return;
    	}
    	
    	$this->_loadProperties();
 	
    	if ( !empty( $this->_properties[$type][$name] ) ) {
    		$this->_head->append( $this->_properties[$type][$name] );
    	}		
    	
    	return $this;
    }
    
           
	private function _loadProperties()
    {
    	if ( empty( $this->_properties ) ) {
    		$properties = simplexml_load_file( $this->_compressorProperties );
    		
    		if ( !empty( $properties ) ) {
    			foreach	( $properties as $property ) {    				
    				$this->_properties[(string) $property->type][(string) $property->name] = $property;
    			}
    		}    		
    	}
    	
    	return $this;
    }
	
}