<?php
session_start();
$random = md5(rand());
$code = substr($random, 0, 6);
$_SESSION["code"]=$code;
$im = imagecreatetruecolor(100, 40);
$bg = imagecolorallocate($im,224, 224, 224); //background color
$fg = imagecolorallocate($im, 0, 146, 179);//text color
imagefill($im, 0, 0, $bg);
imagestring($im, 10, 25, 10,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>


