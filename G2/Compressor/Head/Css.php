<?php 

class G2_Compressor_Head_Css extends G2_Compressor_Head_Abstract
{	
	
	protected function _doAppend( $fileName )
	{
		$this->_view->headLink()->appendStylesheet( $fileName );
		
		return $this;
	}
}