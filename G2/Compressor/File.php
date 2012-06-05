<?php 

class G2_Compressor_File
{
	
	private $_data; 
	
	private $_compressedFile;
	
	private $_uncompressedFile;
	
	
	public function __construct( $data )
	{
		$this->_data = $data;
		
		$this->_setDestinations(); 
	}
	
	
	public function compress()
	{
		exec( "yui-compressor {$this->_uncompressedFile} -o {$this->_compressedFile}" );
		
		return $this;
	}
	
	
	public function concat()
	{
		$files = (array) $this->_data->files;
			
		exec( "cat " . join( " ", $files['file'] ) . "  > {$this->_uncompressedFile}" );
		
		return $this;
	}
		
		
	private function _setDestinations()
	{
		$this->_uncompressedFile = "{$this->_data->destination}{$this->_data->name}.{$this->_data->type}";
		
		$this->_compressedFile = "{$this->_data->destination}{$this->_data->name}.min.{$this->_data->type}";
	}
}