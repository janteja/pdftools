<?php
session_start();
$thumbdir = "/uploads/".$_SESSION['id']."/";
$file = "/uploads/".$_SESSION['id']."/1.pdf";
$im = new imagick($_SERVER['DOCUMENT_ROOT'] .$file.'['.$_GET["page"].']');
//$im->setResolution(150,150);
$im = $im->flattenImages(); 
$im->setCompression(Imagick::COMPRESSION_JPEG); 
//$im->setCompressionQuality(1); 
$im->setImageFormat('jpeg'); 
$im->scaleImage(300, 300, true);
header('Content-Type: image/jpeg');
echo $im;
?>

