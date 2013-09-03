<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

ini_set( "display_errors", true ); // Set to display errors: true/false
date_default_timezone_set( "Europe/Bucharest" ); // Set your timezone. Comment to get the server time
define( "DB_TYPE", "mysql" ); // mysql type
define( "DB_HOST", "localhost" ); // mysql host name; usually is localhost
define( "DB_NAME", "shorturl" ); // your database name
define( "DB_USER", "root" ); // your database user
define( "DB_PASS", "bingo" ); // your database password

define( "SITE_NAME", "Short String URL | " ); // set website name
define( "BASE_URL", "http://localhost/shorturl/" ); //base url
define( "CONTACT_MAIL", "netxpyr@gmail.com" ); // contact mail for the contact form

// ------------------------------------------------------------------------------------------------
// Do not edit after this line if you don't know what your're doing. You'll surely break something
// ------------------------------------------------------------------------------------------------

define( "BASE_CHARS", "abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789" ); // set your own base characters
define( "PATH_THEME", "../themes/" ); // themes directory path
define( "DB_DSN", DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME );

define("PATH_LIB", dirname( dirname( __FILE__ ) ) );
$docRoot = rtrim( $_SERVER['DOCUMENT_ROOT'], '/' );
define( "PATH_BASE", substr( PATH_LIB, strlen( $docRoot ) ) );

?>