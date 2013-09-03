<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

class ActivateUser {
	public $username;
	public $activation_code;

	function __construct( $data = array() ) {
		if ( isset( $data['username'] ) ) $this->username = $data['username'];
		if ( isset( $data['activation_code'] ) ) $this->activation_code = $data['activation_code'];
	}

	// Store $_GET data
	function storeData( $params ) {
		$this->__construct( $params );
	}

	function activate() {
		$conn = new PDO( DB_DSN, DB_USER, DB_PASS );
		$sql = "UPDATE users SET  activation_code = '', activate = '1' WHERE username = :username AND activation_code = :activation_code";
		$st = $conn->prepare( $sql );
		$st->bindValue( ':username', $this->username, PDO::PARAM_STR );
		$st->bindValue( ':activation_code', $this->activation_code, PDO::PARAM_STR );
		$st->execute();
		$conn = null;
	}
}