<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('encryptQRInfo'))
{
	function encryptQRInfo( $data ) 
	{
            $CI =& get_instance();
            
            $key = $CI->config->item ( "encryption_key" );
            
            $encrypted = encrypt ( $data, $key );
            
            return $encrypted;
	}
}


if ( ! function_exists('decryptQRInfo'))
{
	function decryptQRInfo( $data ) 
	{
            $CI =& get_instance();
            
            $key = $CI->config->item ( "encryption_key" );
            
            $decrypted = decrypt ( $data, $key );
            
            return $decrypted;
	}
}


/**
 * Returns an encrypted & utf8-encoded
 */
if ( ! function_exists('encrypt'))
{
    function encrypt($pure_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
        return $encrypted_string;
    }
}


/**
 * Returns decrypted original string
 */
if ( ! function_exists('decrypt'))
{
    function decrypt($encrypted_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
        return $decrypted_string;
    }
}