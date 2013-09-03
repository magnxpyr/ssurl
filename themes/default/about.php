<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

require 'header.php';
?>

<div id="container">
<p>
	<h1>About</h1>
	ssURL is an Open Source short URL service from Magnxpyr Network.
	ssURL come from Short String URL and is an under development service.<br />
	Use ssURL to set your own short URL service for your network or public.
	ssURL is provided AS IS without warranty so use it on your own risk.<br />
	For feedback, bugs or improvements, please contact us.
</p>

<div id="left-panel">
	<h1>Features</h1>
	<ol>
		<li>Uses base 62 without I,l,O,0 to avoid confusion</li>
		<li>Can shorten over 40 billion unique URLs in 6 or less characters</li>
		<li>One click share on popular social networks</li>
		<li>Custom Eye Candy 404 error</li>
		<li>Click counter to see how popular your links has became</li>
		<li>Fast and reliable, using low server resources</li>
		<li>Only uses alphanumeric characters so all browsers can interpret the URL</li>
		<li>Secure - several data filters in place to prevent SQL injection hacks</li>
		<li>Uses 301 redirects for SEO and analytics</li>
		<li>Option to change the characters allowed in a shortened url</li>
		<li>Fast and clean design</li>
		<li>OOP programing for easy development</li>
		<li>Free to use, modify and redistribute. Licensed under GNU/GPL version 3</li>
	</ol>
	
	<div style="height:30px"></div>
	
	<h1>Yet to come...</h1>
	<ol>
		<li>404 error check for the availability of the URL before shortening</li>
		<li>Cached URLs for less mysql queries and performace improvements</li>
		<li>Option to restrict shortening URLs to a closed network</li>
		<li>Friendly installer</li>
		<li>Anti spam captcha</li>
		<li>User accounts to keep track of your links</li>
		<li>Admin panel to manage the entire website in a easy way</li>
		<li>More performace improvements</li>
	</ol>
	

</div>
<div id="right-panel">

	<div align="center"><img alt="ssURL" src="../themes/default/css/screenshot.png"></div>
	<div id="dowl-button"><a href="../download/shorturl.zip">Download ssURL</a></div>
	<div style="height:20px"></div>
	
	<h1>Instalation</h1>
	<ol>
		<li>Make sure your server meets the requirements:<br />
			- Apache<br />
			- PHP<br />
			- MySQL</li>
		<li>Download a .zip file of the PHP URL shortener script files</li>
		<li>Upload the contents of the .zip file to your web server</li>
		<li>Update the database and site info in libs/engine.php</li>
		<li>Import the SQL table called table.sql (using phpMyAdmin)</li>
		<li>Rename htaccess.txt to .htaccess</li>
		<li>You might need to change the path of 404 redirect in .htaccess if using a subdirectory</li>
	</ol>	
</div>
</div>

<?php 
require 'footer.php';
?>