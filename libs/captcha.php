<?php
/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/
session_start();

$string = '';
	
// Generate a random string and store it in a session
for ($i = 0; $i < 5; $i++) {
	// this numbers refer to numbers of the ascii table (lower case)
	$string .= chr( rand( 97, 122 ) );
}
		
$_SESSION['rand_code'] = hash( "sha256", $string );
//$_SESSION['rand_code'] = $string;

// Set the image with width and height
$width = 110;
$height = 25;

// Create the image resource
$image = imagecreate( $width, $height );
		
// We are making three colors, white, black and gray
$gray = imagecolorallocate( $image, 204, 204, 204 );
$color = imagecolorallocate( $image, 200, 100, 90 ); // red
$white = imagecolorallocate( $image, 255, 255, 255 );
		
// Make the background white
imagefill( $image, 0, 0, $white );
		
//Add randomly generated string in white to the image
imagestring( $image, 5, 30, 3, $string, $color );
session_regenerate_id();		
imagerectangle($image,0,0,$width-1,$height-1,$gray);
imageline($image, 0, $height/4, $width, $height/4, $grey);
imageline($image, 0, $height/1.3, $width, $height/1.3, $grey);
imageline($image, $width/4, 0, $width/2, $height, $grey);
imageline($image, $width, 0, $width/2, $height, $grey);
		
header( "Content-Type: image/png" );
imagepng( $image );
imagedestroy( $image );
?>