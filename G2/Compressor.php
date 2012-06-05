<?php 

require_once( dirname( __FILE__ ) . '/Compressor/File.php' );


G2_Compressor::compile();


class G2_Compressor
{
	
	private $_properties;
		
	private $_propertiesFileName = 'g2c.properties.xml';
	
	private $_propertiesFilePath = null;
	
	private $_propertiesXml = null;
	
	
	public static function compile()
	{
		echo "G2 Compressor \n";
		
		$start = time();
		
		$g2Compressor = new self();
		
		$g2Compressor->_readProperties()
					 ->_run();
					 
		$elapsed = time() - $start;				 
					 
		echo "Compile completed in: {$elapsed}s\n";
	}
	
	
	private function _getPropertiesFilePath()
	{
		if ( null === $this->_propertiesFilePath ) {
			
			$this->_propertiesFilePath = getcwd() . '/' . $this->_propertiesFileName;
		}	
		
		return $this->_propertiesFilePath;
	}
	
	
	private function _propertiesFileExists()
	{
		if ( !file_exists( $this->_getPropertiesFilePath() ) ) {
			
			echo "g2c.properties.xml does not exist!\n";
			die;
		}	
		
		return true;
	}
	
	
	private function _propertiesFileNotEmpty()
	{
		$this->_propertiesXml = file_get_contents( $this->_propertiesFilePath );
		
		if ( empty( $this->_propertiesXml ) ) {
			
			echo "g2c.properties.xml is empty!\n";
			die;
		}
		
		return true;
	}
	
	
	private function _readProperties()
	{
		if ( $this->_propertiesFileExists() && $this->_propertiesFileNotEmpty() ) {
			
			$this->_properties = simplexml_load_string( $this->_propertiesXml );
		}
		
		return $this;
	}
	
	
	private function _run()
	{
		foreach ( $this->_properties->compress as $data ) {
			
			$file = new G2_Compressor_File( $data );

			$file->concat()
				 ->compress();
		}
		
		return $this;
	}
	
}