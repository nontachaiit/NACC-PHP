<?php
require_once "./application/libraries/iimage_base.php";
class iimage extends iimage_base
{
	
	private $_collectionDirectory = "collection";
	private $_targetDirectory = "target";
	private $_colorDirectory = "color";
	private $_shapeArmDirectory = "shape_arm";
	private $_shapeNeckDirectory = "shape_neck";
	private $_sizeDirectory = "size";
	private $_styleDirectory = "style";
	private $_vestDirectory = "vest";
	private $_bankDirectory = "bank";
	private $_blockDirectory = "block";
	private $_blockLayerDirectory = "block_layer";
	private $_affiliateResourceDirectory = "affiliate_resource";
	
	public function __construct( )
	{
		$this->_CI =& get_instance();
		$this->_CI->config->load( "app" );
		/* Load Config */
		$this->_ownerPath = $this->_CI->config->item("ASSET_PATH");
	}
	
	/***** Get Path (for crate directory when empty ) *****/
	public function getCollectionPath( $size = "" ) 
	{
		$path = $this->_getPath( $size ) . "/" . $this->_collectionDirectory;
		if( !file_exists( $path ) )
			mkdir( $path );
		return $path;
	}
	
	public function getTargetPath( $size = "" ) 
	{
		$path = $this->_getPath( $size ) . "/" . $this->_targetDirectory;
		if( !file_exists( $path ) )
			mkdir( $path );
		return $path;
	}
	
	public function getColorPath ( $size = "" )
	{
		$path = $this->_getPath ( $size ) . "/" . $this->_colorDirectory;
		if ( !file_exists ( $path ) ) {
			mkdir ( $path );
		}
		
		return $path;
	}
	
	public function getShapeArmPath( $size = "" )
	{
		$path = $this->_getPath( $size ) . "/" . $this->_shapeArmDirectory;
		if( !file_exists( $path ) ) 
			mkdir( $path );
		return $path;
	}
	
	public function getShapeNeckPath ( $size = "" )
	{
		$path = $this->_getPath ( $size ) . "/" . $this->_shapeNeckDirectory;
		if ( !file_exists ( $path ) )
			mkdir ( $path );
			
			
		return $path;
	}
	
	public function getSizePath ( $size = "" )
	{
		$path = $this->_getPath ( $size ) . "/" . $this->_sizeDirectory;
		if ( !file_exists ( $path ) )
			mkdir ( $path );
		
		return $path;
	}
	
	public function getStylePath( $size = "" ) 
	{
		$path = $this->_getPath( $size ) . "/" . $this->_styleDirectory;
		if( !file_exists( $path ) ) 
			mkdir( $path );
		return $path;
	}
	
	public function getVestPath ( $size = "" )
	{
		$path = $this->_getPath( $size ) . "/" . $this->_vestDirectory;
		if( !file_exists( $path ) )
			mkdir( $path );
		return $path;
	}
	
	public function getBankPath ( $size = "" )
	{
		$path = $this->_getPath( $size ) . "/" . $this->_bankDirectory;
		if( !file_exists( $path ) )
			mkdir( $path );
		return $path;
	}
	
	public function getBlockPath ( $size = "" )
	{
		$path = $this->_getPath( $size ) . "/" . $this->_blockDirectory;
		if( !file_exists( $path ) )
			mkdir( $path );
		return $path;
	}
	
	public function getBlockLayerPath ( $size = "" )
	{
		$path = $this->_getPath( $size ) . "/" . $this->_blockLayerDirectory;
		if( !file_exists( $path ) )
			mkdir( $path );
		return $path;
	}
	
	public function getAffiliateResourcePath ( $size = "" )
	{
		$path = $this->_getPath( $size ) . "/" . $this->_affiliateResourceDirectory;
		if( !file_exists( $path ) )
			mkdir( $path );
		return $path;
	}
	
	/**** Get Image (for get image pure) ******/
	public function getCollectionImage( $image, $size = "" )
	{
		$path = $this->_getSizePath( $size );
		$path .= $this->_collectionDirectory . "/" ;
		$path .= $image;
		return $path;
	}
	
	public function getTargetImage( $image, $size = "" )
	{
		$path = $this->_getSizePath( $size );
		$path .= $this->_targetDirectory . "/" ;
		$path .= $image;
		return $path;
	}
	
	public function getColorImage ( $image, $size = "" )
	{
		$path = $this->_getSizePath ( $size );
		$path .= $this->_colorDirectory . "/";
		$path .= $image;
		
		return $path;
	}
	
	public function getShapeArmImage( $image, $size = "" )
	{
		$path = $this->_getSizePath( $size );
		$path .= $this->_shapeArmDirectory . "/" ;
		$path .= $image;
		return $path;
	}
	
	public function getShapeNeckImage ( $image, $size = "" )
	{
		$path = $this->_getSizePath ( $size );
		$path .= $this->_shapeNeckDirectory . "/";
		$path .= $image;
		return $path;
	}
	
	
	public function getSizeImage ( $image, $size = "" )
	{
		$path = $this->_getSizePath ( $size );
		$path .= $this->_sizeDirectory . "/";
		$path .= $image;
		return $path;
	}
	
	public function getStyleImage( $image, $size = "" )
	{
		$path = $this->_getSizePath( $size );
		$path .= $this->_styleDirectory . "/" ;
		$path .= $image;
		return $path;
	}
	
	public function getVestImage ( $image, $size = "" )
	{
		$path = $this->_getSizePath( $size );
		$path .= $this->_vestDirectory . "/" ;
		$path .= $image;
		return $path;
	}
	
	public function getBankImage ( $image, $size = "" )
	{
		$path = $this->_getSizePath( $size );
		$path .= $this->_bankDirectory . "/" ;
		$path .= $image;
		return $path;
	}
	
	public function getBlockImage ( $image, $size = "" )
	{
		$path = $this->_getSizePath( $size );
		$path .= $this->_blockDirectory . "/" ;
		$path .= $image;
		return $path;
	}
	
	public function getBlockLayerImage ( $image, $size = "" )
	{
		$path = $this->_getSizePath( $size );
		$path .= $this->_blockLayerDirectory . "/" ;
		$path .= $image;
		return $path;
	}
	
	public function getAffiliateResourceImage ( $image, $size = "" )
	{
		$path = $this->_getSizePath( $size );
		$path .= $this->_affiliateResourceDirectory . "/" ;
		$path .= $image;
		return $path;
	}
	
	/**** Resize Image */
	public function resizeSmall( $sourceImage, $pathDestination )
	{
		$config = array(
			"image_library" => 'gd2',
			"maintain_ratio" => true,
			"source_image" => $sourceImage,
			"new_image" => $pathDestination,
			"width" => 132,
			"height" => 137,
		);
		
		$this->_CI->load->library('image_lib'); 
		$this->_CI->image_lib->initialize($config);
		$this->_CI->image_lib->resize();
		$this->_CI->image_lib->clear();
	}
	
	public function resizeMedium( $sourceImage, $pathDestination )
	{
		$config = array(
			"image_library" => 'gd2',
			"maintain_ratio" => true,
			"source_image" => $sourceImage,
			"new_image" => $pathDestination,
			"width" => 550,
			"height" => 550,
		
		);
		
		$this->_CI->load->library('image_lib'); 
		$this->_CI->image_lib->initialize($config);
		$this->_CI->image_lib->resize();
		$this->_CI->image_lib->clear();
	}
	
	
	public function resizeLarge ( $sourceImage, $pathDestination )
	{
		$config = array(
				"image_library" => 'gd2',
				"maintain_ratio" => true,
				"source_image" => $sourceImage,
				"new_image" => $pathDestination,
				"width" => 1024,
				"height" => 768,
		
		);
		
		$this->_CI->load->library('image_lib');
		$this->_CI->image_lib->initialize($config);
		$this->_CI->image_lib->resize();
		$this->_CI->image_lib->clear();
		
		
	}
	
	
	
}