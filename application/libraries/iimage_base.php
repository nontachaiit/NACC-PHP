<?php
class iimage_base
{
	const ORIGINAL = "ORIGINAL";
	const SMALL = "SMALL";
	const MEDIUM = "MEDIUM";
	const LARGE = "LARGE";
	
	protected $_CI;
	protected $_ownerPath;
	
	protected $_originalDirectory	= "original";
	protected $_smallDirectory = "small";
	protected $_mediumDirectory = "medium";
	protected $_largeDirectory = "large";
	
	public function getOwnerSize()
	{
		$directory = $this->_getOwnerPath();
		return $this->_getDirectorySize( $directory );
	}
	
	protected function _getOwnerPath()
	{
		$path = $this->_ownerPath;
		
		if( !file_exists( $path ) ) {
			mkdir( $path );
		}
		
		return $path;
	}
	
	protected function _getOriginalPath()
	{
		$path = $this->_getOwnerPath() . "/" . $this->_originalDirectory;
		if( !file_exists( $path ) ) {
			mkdir( $path );
		}
		return $path;
	}
	
	protected function _getSmallPath()
	{
		$path = $this->_getOwnerPath() . "/" . $this->_smallDirectory;
		if( !file_exists( $path ) ) {
			mkdir( $path );
		}
		return $path;
	}
	
	protected function _getMediumPath()
	{
		$path = $this->_getOwnerPath() . "/" . $this->_mediumDirectory;
		if( !file_exists( $path ) ) {
			mkdir( $path );
		}
		return $path;
	}
	
	protected function _getLargePath ()
	{
		$path = $this->_getOwnerPath() . "/" . $this->_largeDirectory;
		if ( !file_exists ( $path) ) {
			mkdir ( $path );
		}
		
		return $path;
	}
	
	
	protected function _getPath( $size = "" )
	{
		$path = "";
		switch( $size )
		{
			case iimage::SMALL : 
				$path .= $this->_getSmallPath();
				break;
			case iimage::MEDIUM :
				$path .= $this->_getMediumPath();
				break;
			case iimage::LARGE :
				$path .= $this->_getLargePath();
				break;
			default :
				$path .= $this->_getOriginalPath();
				break; 
		}
		return $path;
	}
	
	
	protected function _getSizePath( $size ) 
	{
		$path = base_url() 
				. $this->_ownerPath . "/";
				
		switch( $size ) {
			case iimage::SMALL : 
				$path .= $this->_smallDirectory . "/";
				break;
			case iimage::MEDIUM :
				$path .= $this->_mediumDirectory . "/";
				break;
			case iimage::LARGE:
				$path .= $this->_largeDirectory . "/";
				break;
			default :
				$path .= $this->_originalDirectory . "/";
				break;
		}
		return $path;
	}
	
	
	protected function _getDirectorySize( $directory )
	{
		$dirSize=0;
		
		if(!$dh=opendir($directory))
		{
			return false;
		}
		
		while($file = readdir($dh))
		{
			if($file == "." || $file == "..")
			{
				continue;
			}
			
			if(is_file($directory."/".$file))
			{
				$dirSize += filesize($directory."/".$file);
			}
			
			if(is_dir($directory."/".$file))
			{
				$dirSize += $this->_getDirectorySize($directory."/".$file);
			}
		}
		
		closedir($dh);
		
		return $dirSize;
	}
	
	
	
	
}