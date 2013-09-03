<!--
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE.txt
-->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php echo SITE_NAME . $results['pageTitle']; ?></title>
	<link rel="stylesheet" href="<?php echo PATH_BASE ?>/themes/default/css/error.css" /> 
</head>

<body>
<div id="wrapper">
	<div id="errorboxbody">
		<h2>An error has occurred.<br />The requested page cannot be found.</h2>
		<div id="errorbox">
			<p class="errorcode">404</p>
			<p class="errormessage">Page not found</p>
		</div>
		<div id="message">
			<p>You may wish to go back or visit the home page.</p>
			<ul>
				<li><a href="<?php echo PATH_BASE; ?>">Home</a></li>
				<li><a href="about">About</a></li>
				<li><a href="contact">Contact</a></li>
			</ul>	
		</div>
		<p style="margin-top: 20px; color: #ccc;">If difficulties persist, please contact the System Administrator of this site..</p>
	</div>		
</div>

</body>
</html>