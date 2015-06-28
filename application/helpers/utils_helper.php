<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('convertStringNtoBR') ) {
	function convertStringNtoBR( $val )
	{
		return str_replace("<br />","", $val);
	}
}


if ( ! function_exists('convertStringBRtoN') ) {
	function convertStringBRtoN( $val )
	{
		return str_replace("\n","", $val);
	}
}


if ( ! function_exists('getYoutubeIDFromURL' ) ) {
	function getYoutubeIDFromURL ( $url ) {
		preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);

		if ( count($matches) <= 0 ) return $url;
		
		return $matches[0];
	}
}

/******************* Generate Code ********************/
if ( ! function_exists('genCode') ) {
	function genCode( $number )
	{
		$key = "";
		for( $i = 0 ; $i < $number ; $i++ ) {
			$index = rand(1,3);
			switch( $index ) {
				case 1 : 
					$key .= chr( rand( 65,90 ) );
					break;
				case 2 :
					$key .= chr( rand( 97, 122 ) );
					break;
				case 3 :
					$key .= chr( rand( 48, 57 ) );
					break;
				default : 
					$key .= "";
					break;
			}
		}
		return $key;
	}
}


if ( ! function_exists( 'genNumber' ) ) {
	function genNumber ( $numOfChar ) {
		$a = "";
		for ($i = 0; $i < $numOfChar; $i++)
		{
			$a .= mt_rand(0,9);
		}
		
		return $a;
	}
}


/******************* File Size ********************/

if ( ! function_exists('getByte') ) {
	function getSizeUnit( $unit, $format = "" )
	{
		$KB = 1024;
		$MB = $KB * $KB;
		$GB = $KB * $KB * $KB;
		
		$val = 0;
		if( $format == "KB" ) {
			$val = $unit * $KB ;
		}
		else if( $format == "MB" ) {
			$val = $unit * $MB;
		}
		else if( $format == "GB" ) {
			$val = $unit * $GB;
		}
		else {
			$val = $unit;
		}
		return $val;
	}
}

if ( ! function_exists('formatSizeUnits') ) {
	function formatSizeUnits( $bytes, $format = "" )
	{
		if ($bytes >= 1073741824){
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576){
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024){
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1){
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1){
            $bytes = $bytes . ' byte';
        }
        else {
            $bytes = '0 bytes';
        }

        return $bytes;
	}
}



/******************** Directory *********************/
if ( ! function_exists('createDirectory') ) {
	function createDirectory( $directory )
	{
		$res = false;
		if( !file_exists( $directory ) ) {
			$res = mkdir( $directory );
		}
		return $res;

	}
}

/******************* Remove String ************************/
if ( ! function_exists('removeString') ) {
	function removeString( $charector, $val )
	{
		return str_replace( $charector, "", $val );
	}
}



/******************* Image Show ********************/
if ( ! function_exists('imageShow') ) {
	function imageShow( $image )
	{
		return $image . "?" . time();
	}
}