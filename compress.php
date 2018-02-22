<?php
session_start();
$_SESSION['dl'] = bin2hex(random_bytes(16));
$dir = "uploads/".$_SESSION['id']."/";
$compressed = "uploads/".$_SESSION['id']."/".$_SESSION['dl'].".pdf";
$file = "uploads/".$_SESSION['id']."/1.pdf";
if (file_exists($file)){

$html = <<<XYZ
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/normalize.css"/>
 <link rel="stylesheet" type="text/css" href="css/demo.css" />
 <link rel="stylesheet" type="text/css" href="css/component.css"/>
 <script src="js/modernizr.custom.js"></script>

<style>
body {
height:100%;
background-color: #ecf0f1;
text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 400;
        text-shadow: 0 0 1px rgba(255,255,255,0.3);
        font-size: 1.1em;
}

</style>
</head>
<body>
XYZ;
echo $html;
$cmd = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/screen -dNOPAUSE -dBATCH  -dQUIET -sOutputFile=".$compressed." ".$dir."1.pdf";
$output = shell_exec($cmd);
$html = <<<XYZ
<div class="center">
<h1 class="custom"> Done </h1>
</div>
<nav class="cl-effect-7">
<ul>
    <li>  <a  href="/" datahover="Merge">Home</a> </li>
</ul>
                              </nav>
</body>
</html>
XYZ;
echo $html;
}
else {
}
if (isset($_POST["merge"])){
$url='selection.php';
$cmd = "mv ".$merged." ".$file ;
$output = shell_exec($cmd);
$cmd = "find ".$dir ." -type f -not -name 1.pdf -delete";
$output = shell_exec($cmd);
}
else {$url='download.php';}
echo '<META HTTP-EQUIV=REFRESH CONTENT="0; '.$url.'">';

?>
