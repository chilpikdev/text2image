<?php

// Set the content-type
header('Content-Type: image/png');

// Create the image
$im = imagecreatetruecolor(300, 30);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 247, 248, 248);
$grey2 = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $grey);

// The text to draw
$text = "Test";
// Replace path by your own font path
$font = 'assets/inter-latin-400-normal-nYvLeTLv.woff';

// Add some shadow to the text
imagettftext($im, 12.5, 0, 1, 20, $grey2, $font, $text);

// Add the text
imagettftext($im, 12.5, 0, 0, 20, $black, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
ob_start();
imagepng($im);
printf('<img id="output" src="data:image/png;base64,%s" />', base64_encode(ob_get_clean()));
imagedestroy($im);
