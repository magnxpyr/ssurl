<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

require 'header.php';
?>
<script>
function rmEl($id) {
	var div = document.getElementById($id);
	div.parentNode.removeChild(div);
}
</script>
<?php
if ( isset($status) != '' ) {
?>
<div id="status">
	<a class="close" onclick="rmEl('status')">x</a>
	<?php echo $status ?>
</div>
<?php } ?>

<div id="container">
	<div style="margin: 0 0 30px 200px;"><h2><?php echo $results['pageTitle']; ?></h2></div>

	<form action="#" method="post">
	<ul style="margin-left: 200px;">
		<li>
			<label for="name">Name *</label>
			<input type="text" name="name" style="width: 200px;" required />
		</li>
		<li>
			<label for="email">Email *</label>
			<input type="email" name="email" style="width: 200px;" required />
		</li>
		<li>
			<label for="website">Website</label>
			<input type="url" name="website" style="width: 200px;" />
		</li>
		<li>
			<label for="reason">Why contacting us?</label>
			<select name="reason" style="width: 150px">
				<option value="Feedback">Feedback</option>
				<option value="Support">Support</option>
				<option value="Other">Other</option>
			</select>
		</li>
		<li>
			<label for="message">Message *</label><p></p>
			<textarea name="message" style="height: 150px; width: 450px;"></textarea>
		</li>
		<li>
			<label for="chimg"></label>
			<img src="../libs/captcha.php" name="chimg">
		</li>
		<li>
			<label for="captcha">Are you human? *</label>
			<input type="text" name="captcha" style="width: 200px;" required />
		</li>
		<li style="margin-top: 5px;">
			<button type="submit" name="sendMail" value="Send">Send</button>
		</li>
	</ul>
	</form>
</div>

<?php
require 'footer.php';
?>