<?php 

if ( !defined( 'G2_ROOT' ) ) {
	
	define( 'G2_ROOT', realpath( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '..' ) . DIRECTORY_SEPARATOR );

	require( G2_ROOT . 'Autoloader.php' );
	
	G2_Autoloader::register();
}


class G2_Compressor_Head
{
	
	protected $_compressorProperties;
	
	protected $_head;
	
	protected $_properties = array();
	
	private static $_instance;
	
	
	public function __construct()
	{
		self::$_instance = $this;
		
 		$this->_compressorProperties = APPLICATION_PATH . '/../g2c.properties.xml'; 
	}
	
	
	/**
	 * @return G2_Compressor_Head
	 */
	public static function getInstance()
	{
		if ( empty( self::$_instance ) ) {
			self::$_instance = new G2_Compressor_Head();	
		}
	
		return self::$_instance;
	}
	
	/**
	 * @return G2_Compressor_Head
	 */
	public function appendCss( $name )
	{
		$this->_head = new G2_Compressor_Head_Css();
		
		$this->_append( $name, 'css' );
		
		return $this;
	}
	
	/**
	 * @return G2_Compressor_Head
	 */
	public function appendJavaScipt( $name )
	{
		$this->_head = new G2_Compressor_Head_JavaScript();
		
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
    }
}