<?php

/*
 * PHP GD
 * adding watermark to an image with GD library
 */

// Load the watermark and the photo to apply the watermark to
$stamp = imagecreatefrompng('images/bell-matrimony.png');
$im = imagecreatefromjpeg('images/back.jpg');

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));


imagejpeg($im, 'images/img.jpg' , 90);
// Output and free memory
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>