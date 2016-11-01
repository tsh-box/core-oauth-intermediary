<?php
spl_autoload_register( function ( $class ) {
	include strtolower( $class ) . '.php';
} );

require_once '/opt/oauth-intermediary/config.php';	

$crypto = new Crypto( $config['crypto_key'], $config['crypto_iv'] );

if ( array_key_exists( 'origin_uri', $_GET ) ) {
	$origin_uri = $_GET['origin_uri'];
	$state = $crypto->encrypt( $origin_uri );
} else if ( array_key_exists( 'state', $_GET ) ) {
	$state = $_GET['state'];
	$origin_uri = $crypto->decrypt( $state );
} else {
	http_response_code( 400 );
	exit;
}
?>