<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

class User {
	public $id;
	public $username;
	public $password;
	public $email;
	public $email_code;

	function __construct( $data = array() ) {
	//	if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
		if ( isset( $data['username'] ) ) $this->username = $data['username'];
		if ( isset( $data['password'] ) ) $this->password = $data['password'];
		if ( isset( $data['email'] ) ) $this->email = $data['email'];
	}

	// Store all data from form
	function storeData( $params ) {
		$this->__construct( $params );
	}

	// Creating and adding the users in DB
	function create() {
		$conn = new PDO( DB_DSN, DB_USER, DB_PASS );
		$sql = 'INSERT INTO users( id, username, password, email) VALUES ( :id, :username, :password, :email, :activation_code, :active )';
		$st = $conn->prepare( $sql );
		$st->bindValue( ':id', $this->id, PDO::PARAM_INT );
		$st->bindValue( ':username', $this->username, PDO::PARAM_STR );
		$st->bindValue( ':password', $this->password, PDO::PARAM_STR );
		$st->bindValue( ':email', $this->email, PDO::PARAM_STR );
		$st->bindValue( ':activation_code', $this->email_code, PDO::PARAM_STR );
		$st->bindValue( ':active', '0', PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}

	// Generate the hashed code that will be sent to user for activation
	function generate_email_code() {
		$this->email_code = base64_encode( mcrypt_create_iv( 24, MCRYPT_DEV_URANDOM ));
		return $this->email_code;
	}

	// Send the activation code to the user
	function send_activation_email() {
		if ( isset( $this->email ) ) {
			$headers =  "FROM: SITE_NAME CONTACT_MAIL";
			$subject = SITE_NAME . ' - Account Activation';
			$formcontent = "Welcome to Short String URL \n In order to activate your account please click on the link below \n BASE_URL?action=activation&username=$this->username&activation_code=$this->email_code";

			mail( $this->email, $subject, $formcontent, $headers );
		} else die('Error');
	}
}