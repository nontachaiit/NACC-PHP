<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getFileNameThumbnail'))
{
	function getFileNameThumbnail( $fileName ) 
	{
		$aFile = explode( "." , $fileName );
		$nameThum = "";
		for( $i = 0 ; $i < count( $aFile ) - 1; $i++ ) {
			$nameThum .= $aFile[$i];
		}
		$nameThum .= "_thumb";
		$nameThum .= "." . end( $aFile );
		return $nameThum;
	}
}



if ( ! function_exists('getThumnailSize'))
{
	function getThumnailSize( $limitWidth, $limitHeight, $width, $height ) 
	{
		$size['width'] = 0;
		$size['height'] = 0;
		if( $width >= $height ) {
			$percent = getPercentage( $width, $limitWidth );
			$size['width'] = $limitWidth;
			$size['height'] = ( $height * $percent ) / 100;
		}
		else {
			$percent = getPercentage( $height, $limitHeight );
			$size['width'] = ( $width * $percent ) / 100;
			$size['height'] = $limitHeight;
		}
		return $size;
	}
}




