<?php
function push_android ( $deviceToken, $message, $type, $ref_id )
{
	$apiKey = "AIzaSyA_2UjDONb85OU8EijnzTOUnl1a-vnA9mc";

	if ( is_array ( $deviceToken ) ) {
		$registrationIDs = $deviceToken;
	} else {
		$registrationIDs = array ( $deviceToken );
	}

	// Set POST variables
	$url = 'https://android.googleapis.com/gcm/send';

	// type 1 = CHAT_NOTIFICATION_TYPE
	$fields = array(
                'registration_ids'  => $registrationIDs,
                'data'              => array( "message" => $message, "type" => $type, "ref_id" => $ref_id  ),
                );

	// 'data' => array ( "id" => 10, "message" => $message, "type" => "al", "number" => 3, "sound" => "file sound", "type" => 1, "operator" => 5)

	$headers = array(
                    'Authorization: key=' . $apiKey,
                    'Content-Type: application/json'
                );

	// Open connection
	$ch = curl_init();

	// Set the url, number of POST vars, POST data
	curl_setopt( $ch, CURLOPT_URL, $url );

	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

	// Execute post
	$result = curl_exec($ch);

	// Close connection
	curl_close($ch);

	$json_response = json_decode ( $result );
	
	
	if ( $json_response == null ) return false;
	
	if ( $json_response->success >= 1 ) return true;
	else return false;
	//echo $result;
}

function push_ios ( $ck_file, $deviceToken, $message, $type, $ref_id, $badge = 0) {
	
	$ci =& get_instance();
	$ci->config->load( "app" );
	$isDevelop = $ci->config->item("SYSTEM_DEVELOP");
	
	// Put your device token here (without spaces):
	// $deviceToken = '4810b36c981056d56646a544f9493baedae1ed716660d9fa563dc8de60c5410b';

	// Put your private key's passphrase here:
	$passphrase = '[ibKymoblg9viNkeeate';
	
	if ( strlen ($message) >= 255 ) {
		$message = substr ( $message, 0, 240 );
		$message = mb_substr( $message,0, mb_strlen($message) - 2, 'UTF-8') . "...";	
	}
	
	
	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert', $ck_file );
	stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
	stream_context_set_option($ctx, 'ssl', 'cafile', "./assets/system/entrust_2048_ca.cer" );

	// Open a connection to the APNS server
	if( $isDevelop ) {
		$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
	}
	else {
		$fp = stream_socket_client(
			'ssl://gateway.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
	}

	if (!$fp) {
		return false;
		//exit("Failed to connect: $err $errstr" . PHP_EOL);
	}

	//echo 'Connected to APNS' . PHP_EOL;

	// Create the payload body
	$body['aps'] = array(
		'alert' => $message,
		'sound' => 'default',
		'badge' => $badge
	);

	$body['type'] = $type;
	$body['ref_id'] = $ref_id;
	
	// Encode the payload as JSON
	$payload = json_encode($body);

	// Build the binary notification
	if ( is_array ( $deviceToken ) ) {
		for ( $i = 0; $i < count($deviceToken); $i++ ) {
			$msg = chr(0) . chr(0) . chr(32) . pack('H*', str_replace( ' ', '', $deviceToken[$i])) . chr(0) . chr(strlen($payload)) . $payload;
	
			$result = fwrite ($fp, $msg, strlen($msg));
		} 
	} else {
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		$result = fwrite ( $fp, $msg, strlen($msg) );
	}

	// Send it to the server
	//$result = fwrite($fp, $msg, strlen($msg));

	// Close the connection to the server
	fclose($fp);
	
	if (!$result) return false;
	else return true;
}



function push_windows ( $deviceToken, $message )
{
}

