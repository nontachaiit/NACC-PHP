<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sendMail') ) {
	function sendEmail( $from, $fromName, $to, $aBCC, $subject, $message  )
	{
		$ci =& get_instance();
		$ci->load->library('email');
		
		$configs['mailtype'] = "html";
		$configs['charset'] = "utf-8";
		$configs['protocol'] = "smtp";
        $configs['smtp_port'] = '25';
        $configs['smtp_host'] = 'smtp.keeate.com'; // localhost
        $configs['smtp_timeout'] = '7';
        $configs['smtp_user'] = "no-reply@keeate.com";
        $configs['smtp_pass'] = "noreplykeeatecom";
        $configs['validation'] = TRUE; // TRUE

		$ci->email->initialize($configs);
		
		$ci->email->set_crlf( "\r\n" ); // Fix Bug for Somemail
		
		$ci->email->from( $from, $fromName );
		$ci->email->to( $to ); 
		
		if( count( $aBCC ) != 0 ) {
			$ci->email->bcc( join( ",", $aBCC ) ); 
		}
		
		$ci->email->subject( $subject );
		$ci->email->message( $message );	
		
		$result = $ci->email->send();
		
	}
}

