<?php
class Crypto {

	var $key;
	var $iv;
	var $method = 'aes-256-cbc';

	public function __construct( $key, $iv ) {
		$this->key = $key;
		$this->iv = base64_decode( $iv );
	}

	public function encrypt( $d ) {
		return openssl_encrypt( $d, $this->method, $this->key, 0, $this->iv );
	}

	public function decrypt( $d ) {
		return openssl_decrypt( $d, $this->method, $this->key, 0, $this->iv );
	}

}
?>