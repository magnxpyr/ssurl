<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

class ShortURL {
	public $id;
	public $longurl;
	public $shorturl;
	public $date;
	public $counter;
	
	function __construct( $data = array() ) {
		if ( isset( $data['id'] ) ) $this->id = $data['id'];
		if ( isset( $data['longurl'] ) ) $this->longurl = $data['longurl'];
		if ( isset( $data['shorturl'] ) ) $this->shorturl = $data['shorturl'];
		if ( isset( $data['date'] ) ) $this->date = $data['date'];
		if ( isset( $data['counter'] ) ) $this->counter = $data['counter'];
	}
	
	function storeData( $params ) {
		$this->__construct( $params );
	}
	
	function createShortURL ( $id ) {
		
		//base 62 converstion without l,I,O,0 to avoid confusion
		$base_chars = BASE_CHARS;
		$length = strlen( $base_chars );
		$out = '';
		
		while ( $id > $length-1 ) {
			$out = $base_chars[ floor( $id % $length ) ] . $out;
			$id = floor( $id / $length );		
		}
		
		return $base_chars[$id] . $out;
	}
	
	function insert() {
		
		//insert in database the short url
		$conn = new PDO( DB_DSN, DB_USER, DB_PASS );
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO shorturl ( longurl ) VALUES ( :longurl )";
		$st = $conn->prepare( $sql );
		$st->bindValue( ":longurl", $this->longurl, PDO::PARAM_STR );		
		$st->execute();
		$this->id = $conn->lastInsertId();
		
		$this->shorturl = self::createShortURL ( $this->id );
		$sql = "UPDATE shorturl SET shorturl=:shorturl WHERE id=:id";
		$st = $conn->prepare( $sql );
		$st->bindValue( ':id', $this->id, PDO::PARAM_INT );
		$st->bindValue( ":shorturl", $this->shorturl, PDO::PARAM_STR );
		$st->execute();
		$conn = null;
	}
	
	function checkURL() {
		$conn = new PDO( DB_DSN, DB_USER, DB_PASS );
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT longurl FROM shorturl WHERE longurl=:longurl";
		$st = $conn->prepare( $sql );
		$st->bindValue( ":longurl", $this->longurl, PDO::PARAM_STR );
		$st->execute();
		$row = $st->fetchColumn();
		$conn = null;
		
		return $row;
	}
	
	function getList( $longurl ) {
		$conn = new PDO( DB_DSN, DB_USER, DB_PASS );
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM shorturl WHERE longurl=:longurl LIMIT 1";
		$st = $conn->prepare( $sql );
		$st->bindValue( ":longurl", $longurl, PDO::PARAM_STR );
		$st->execute();
		
		$list = array();
		while ( $row = $st->fetch() ) {
			$shorturl = new ShortURL( $row );
			$list[] = $shorturl;
		}
		
		$conn = null;
		return ( array( "results" => $list ) );
	}
	
}
?>