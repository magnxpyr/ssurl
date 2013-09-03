<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

class SendMail {
	
	public $name;
	public $email;
	public $website;
	public $reason;
	public $message;
	
	function __construct( $data = array() ) {
		if ( isset( $data['name'] ) ) $this->name = $data['name'];
		if ( isset( $data['email'] ) ) $this->email = $data['email'];
		if ( isset( $data['website'] ) ) $this->website = $data['website'];
		if ( isset( $data['reason'] ) ) $this->reason = $data['reason'];
		if ( isset( $data['message'] ) ) $this->message = $data['message'];
	}
	
	function storeData( $params ) {
		$this->__construct( $params );
	}
	
	function mail() {
		if( isset( $this->email ) ) {
			$formcontent = "From: $this->name \n Website: $this->website \n Message: \n $this->message";
			$subject = SITE_NAME . $this->reason;
			$headers = "From: $this->name $this->email";
			
			mail( CONTACT_MAIL, $subject, $formcontent, $headers );
		} else die("Error!");
	}
}