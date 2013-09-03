<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE.txt
*/

require 'header.php';
?>


<div id="container">
	<div id="boxhome" align="center">
		<form action="index.php?action=shorten&<?php echo $results['formAction']; ?>" method="post">
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

<?php foreach ( $results['shorturl'] as $ssurl ) { ?>

<div id="view-url">
	<div id="view-url-info">
		<div id="shorten-box">
			<div id="info-copy-box"><div id="info-copy-box-arrow"></div>Press CTRL+C to copy</div>
			<input type="text" value="<?php echo BASE_URL . $ssurl->shorturl ?>" name="longurl" id="idlongurl" size=30px; onclick="this.select();" onfocus="showbox('info-copy-box','block');" onblur="showbox('info-copy-box','none');" readonly="readonly" />
		</div>
		<p class="lurl"><a href="<?php echo $ssurl->longurl ?>" title="<?php echo $ssurl->longurl ?>" target="_blank"><?php echo $ssurl->longurl ?></a></p>
		<p class="date"><?php echo $ssurl->date ?></p>
		<p class="counter"><?php echo 'Counter: ' . $ssurl->counter . ' clicks' ?></p>
	</div>
	<div id="view-url-share">
		<a href="<?php echo BASE_URL . $ssurl->shorturl ?>" class="twitter-share-button" data-url="<?php echo BASE_URL . $ssurl->shorturl ?>" data-via="magnxpyr" data-lang="en">Tweet</a>
		<div class="g-plus" data-action="share" data-annotation="bubble" data-href="<?php echo BASE_URL . $ssurl->shorturl ?>"></div>
		<div class="fb-like" data-href="<?php echo BASE_URL . $ssurl->shorturl ?>" data-layout="button_count" data-width="450" data-show-faces="false"></div>
	</div>
</div>

<?php } ?>
</div>

<script>
function showbox(id,display){
	document.getElementById(id).style.display=display;
}
window.onload = function(){
	  var text_input = document.getElementById ('idlongurl');
	  text_input.focus ();
	  text_input.select ();
}
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=229341567112806";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<?php 
require 'footer.php';
?>