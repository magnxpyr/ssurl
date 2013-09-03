<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE.txt
*/

require 'header.php';
?>

<div id="container">
	<div id="boxhome" align="center">
		<form action="page/index.php?action=homepage&<?php echo $results['formAction']; ?>" method="post">
			<ul>
			<li>
				<input type="url" name="longurl" required />
			</li>
			<li>
				<button type="submit" name="saveChanges" value="Shorten">Shorten</button>
			</li>
			</ul>
		</form>
	</div>
<div id="home-panels">
<div id="left-panel">
	<ul>
		<li class="spr3"><h1>One click social networking</h1> Share your links with your friends on facebook, twitter and google+ in one click</li>
		<li class="spr1"><h1>Count your clicks</h1> Track your links to see how popular they became. More clicks more fame</li>
		<li class="spr6"><h1>Over 40 billion URLs</h1> Can shorten over 40 billion unique URLs in 6 characters, using only alphanumeric characters</li>
	</ul>
</div>
<div id="right-panel">
	<ul>
		<li class="spr4"><h1>Fast. Flexible. Ease of use</h1>Fast and reliable, using low server resources. Easy to develop and expand. Fast and clean design</li>
		<li class="spr5"><h1>Search engine optimization</h1>Uses 301 redirects and 404 error headers for SEO, analytics and eye candy</li>
		<li class="spr2"><h1>Free as in freedom</h1> Free to use, modify and redistribute. Licensed under GNU/GPL version 3</li>
	</ul>
</div>
</div>
<div style="clear:both"></div>
<div id="dowl-button"><a href="page/about">Read more &amp; Download</a></div>
</div>

<?php 
require 'footer.php';
?>