<?php

	header('Content-type: image/jpeg');
if(!isset($_SESSION))
	session_start();

	for($i = 0;$i < 3;$i++)
{
	$pass_phrase .= chr(rand(97,122)) .rand(0,9);
}
	$_SESSION['captcha'] = $pass_phrase;
	

	
$text = $_SESSION['captcha'];
	// $text = 1522;
$font_size = 30;

$image_width = 150;
$image_height = 40;
$image = imagecreate($image_width, $image_height);
imagecolorallocate($image,255 ,255 ,255);
$text_color = imagecolorallocate($image, 0, 0, 0);

for ($i =1;$i<=30;$i++)
{
	$x1 = rand(1,150);
	$y1 = rand(1,150);
	$x2 = rand(1,150);
	$y2 = rand(1,150);
	imageline($image, $x1, $y1, $x2, $y2, $text_color);
}
imagettftext($image, $font_size, 0, 15, 30, $text_color, 'fonts/Ubuntu-C.ttf', $text);
imagejpeg($image);
?>