<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

require '../libs/engine.php';
require '../libs/users.php';
require '../libs/activate_user.php';

$action = isset( $_GET['action'] ) ? $_GET['action'] : '';

switch( $action ) {
	case 'activation':
		activation();
		break;
	default:
		signin();
}

// Create a new user
function signin() {
	$results = array();
	$results['pageTitle'] = 'Create User';
	if ( isset( $_POST['createUser'] ) ) {
		$user = new User();
		$user->storeData( $_POST );
		$user->generate_email_code();
		$user->create();
		$user->send_activation_email();
	}
	require( PATH_THEME . 'default/users.php' );
}

// Activate an User based on username and activation code
function activation() {
	if ( isset( $_GET['username']) & isset( $_GET['activation_code'] ) ) {
		$activate = new ActivateUser();
		$activate->storeData( $_GET );
		$activate->activate();
	} else die('Error');
}