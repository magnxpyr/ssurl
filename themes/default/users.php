<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

require 'header.php';
?>

<div id="container">
	<div style="margin: 0 0 30px 200px;"><h2><?php echo $results['pageTitle']; ?></h2></div>

	<form action="#" method="POST">
		<li>
			<label for="username">Username *</label>
			<input type="text" name="username" required />
		</li>
		<li>
			<label for="password">Password *</label>
			<input type="password" name="password" required />
		</li>
		<li>
			<label for="email">Email *</label>
			<input type="email" name="email" required />
		</li>
		<li>
			<button type="submit" name="createUser" value="Submit">Submit</button>
		</li>
	</form>
</div>

<?php require 'footer.php'; ?>