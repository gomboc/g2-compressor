<?php 

class G2_Compressor_Head_JavaScript extends G2_Compressor_Head_Abstract
{
	
	protected function _doAppend( $fileName )
	{
		$this->_view->headScript()->appendFile( $fileName );
		
		return $this;
	}
}