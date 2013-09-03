<?php
/*
 * @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/
require 'libs/engine.php';
require 'libs/redirect_url.php';

//redirect url
$redirectURL = new RedirectURL;
$redirectURL->storeData( $_GET['string'] );
$redirectURL->getByString();
$redirectURL->redirect();

?>