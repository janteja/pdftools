<?php
session_start();
$file = "uploads/".$_SESSION['id']."/".$_SESSION['dl'].".pdf";
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}else {
$url='/';
echo '<META HTTP-EQUIV=REFRESH CONTENT="5; '.$url.'">';
}
session_destroy();
?>
<html>
<head>
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
<div class="center">
<h1 class="custom" style="color:yellow;"> Nothing to download </h1>
</div>
<nav class="cl-effect-7">
<ul>
    <li>  <a  href="/" datahover="Merge">Home</a> </li>
</ul>                             </nav>
</body>
</html>
