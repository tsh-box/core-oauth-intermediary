<?php
require_once '/opt/oauth-intermediary/lib/header.php';
extract( $config['healthgraph'] );

if ( array_key_exists( 'code', $_GET ) ) {
	$code = $_GET['code'];
	$query = http_build_query( array(
			'grant_type' => 'authorization_code',
			'code' => $code,
			'client_id' => $client_id,
			'client_secret' => $client_secret,
			'redirect_uri' => $redirect_uri,
	), $enc_type = PHP_QUERY_RFC1738 );
	$c = curl_init();
	curl_setopt( $c, CURLOPT_URL, $token_url );
	curl_setopt( $c, CURLOPT_POST, 1 );
	curl_setopt( $c, CURLOPT_POSTFIELDS, $query );
	curl_setopt( $c, CURLOPT_HTTPHEADER, 
			array( 'Content-Type: application/x-www-form-urlencoded' ) );
	curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
	$data = curl_exec( $c );
	curl_close( $c );
	header( "Location: $origin_uri?data=" . urlencode( $data ) );
} else if ( array_key_exists( 'error', $_GET ) ) {
	header( "Location: $origin_uri?error=" . urlencode( $_GET['error'] ) );
	exit;
} else if ( array_key_exists( 'start', $_GET ) ) {
	$query = http_build_query( array (
			'response_type' => 'code',
			'client_id' => $client_id,
			'state' => $state,
			'redirect_uri' => $redirect_uri,
	) );
	header( "Location: $auth_url?$query" );
	exit;
} else {
	http_response_code( 400 );
	exit;
}
?>
