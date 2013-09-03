<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/
session_start();
require '../libs/engine.php';
require '../libs/shorturl.php';
require '../libs/sendmail.php';
require '../libs/users.php';


$action = isset( $_GET['action'] ) ? $_GET['action'] : '';

switch( $action ) {
	case 'shorten';
		shorten();
		break;
	case 'about';
		about();
		break;
	case 'contact';
		contact();
		break;
	case 'homepage';
		homepage();
		break;
	default:
		error();
		
}

function homepage() {
	$results = array();
	$results['pageTitle'] = 'Homepage';
	$results['formAction'] = 'submitURL';
	
	if ( isset( $_POST['saveChanges'] ) ) {
		
		// Save short URL
		$shortURL = new ShortURL();
		$shortURL->storeData( $_POST );
		
		if( $shortURL->checkURL() != $shortURL->longurl ) {
			$shortURL->insert();
		}
		header( "Location: index.php?action=shorten&url=$shortURL->longurl" );
	}
	
	require( PATH_THEME . 'default/homepage.php' );
}

// Shorten a new URL
function shorten() {
	$data = ShortURL::getList( $_GET['url'] );
	$results = array();
	$results['shorturl'] = $data['results'];
	$results['pageTitle'] = 'Shorten';
	$results['formAction'] = 'submitURL';
	
	if ( isset( $_POST['saveChanges'] ) ) {
	
		// Save short URL
		$shortURL = new ShortURL();
		$shortURL->storeData( $_POST );
	
		if( $shortURL->checkURL() != $shortURL->longurl ) {
			$shortURL->insert();
		}
		header( "Location: index.php?action=shorten&url=$shortURL->longurl" );
	}
	
	require( PATH_THEME . 'default/shorten.php' );
}

// Create contact page and email send
function contact() {
	$results = array();
	$results['pageTitle'] = 'Contact';
	$results['formAction'] = 'mailSent';
	if ( isset( $_POST['sendMail'] ) ) {
		if ( hash( "sha256", $_POST['captcha'] ) == $_SESSION['rand_code'] ) {
			$status = '<pre><b>Notice:</b>  Message has been sent. Thank you for your feedback!</pre>';
			// send mail
			$sendMail = new SendMail();
			$sendMail->storeData( $_POST );
			$sendMail->mail();
		}
		else $status = '<pre><b>Warning:</b>  Incorrect Captcha. Please try again with more attention!</pre>';
	}
	require( PATH_THEME . 'default/contact.php' );
}

// Create about page
function about() {
	$results = array();
	$results['pageTitle'] = 'About';
	require( PATH_THEME . 'default/about.php' );
}

// Generate error page
function error() {
	$results = array();
	$results['pageTitle'] = 'Error 404';
	header( "HTTP/1.0 404 Not Found" );
	require( PATH_THEME . 'default/error.php' );
}
?>