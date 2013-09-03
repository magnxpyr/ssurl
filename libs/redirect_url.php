<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

class RedirectURL {
	
	public $shorturl;
	public $longurl;
	
	function __construct( $data = '' ) {
		if ( isset( $data ) ) $this->shorturl = $data;
	}
	
	function storeData( $params ) {
		$this->__construct( $params );
	}
	
	function getByString () {
		
		// Get the long url using the small one
		$conn = new PDO( DB_DSN, DB_USER, DB_PASS );
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT longurl, counter FROM shorturl WHERE shorturl=:shorturl LIMIT 1';
		$st = $conn->prepare( $sql );
		$st->bindValue( ':shorturl', $this->shorturl, PDO::PARAM_STR );
		$st->execute();
		$st->bindColumn( 'longurl', $this->longurl, PDO::PARAM_STR );
		$st->bindColumn( 'counter', $counter, PDO::PARAM_INT);
		$st->fetch();
		
		$sql = 'UPDATE shorturl SET counter=:counter WHERE shorturl=:shorturl';
		$st = $conn->prepare( $sql );
		$st->bindValue( ':shorturl', $this->shorturl, PDO::PARAM_STR );
		$st->bindValue( ':counter', $counter+1, PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}
	
	function redirect() {
		if ( isset( $this->longurl ) ) {
			header( "HTTP/1.1 301 Moved Permanently" );
			header( "Location: " . $this->longurl );
		} else {
			header( "HTTP/1.0 404 Not Found" );
			header( "Location: error.php?code=404");
		}
	}
}
?>