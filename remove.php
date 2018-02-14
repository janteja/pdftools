<?php
session_start();
$totalPages = $_SESSION['pages'];
$files = "uploads/".$_SESSION['id']."/1.pdf ";
$_SESSION["dl"] = bin2hex(random_bytes(22));
$removed = "uploads/".$_SESSION['id']."/".$_SESSION['dl'].".pdf";
$pages ="";
for($x=1; $x <= $totalPages; $x++){


 if (!isset($_POST[$x])) {
        $pages = $pages.' '.$x;
    }
}
$html = <<< XYZ
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/normalize.css"/>
 <link rel="stylesheet" type="text/css" href="css/demo.css" />
 <link rel="stylesheet" type="text/css" href="css/component.css"/>

 <script src="js/modernizr.custom.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.imgcheckbox.js"></script>

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
<h1 class="custom"> Done </h1>
</div>
<nav class="cl-effect-7">
<ul>
    <li>  <a  href="/" datahover="Merge">Home</a> </li>
</ul>
                              </nav>
</body>
</hea>
XYZ;
echo $html;
$cmd = "pdftk ".$files."cat ".$pages." output ".$removed ;
$output = shell_exec($cmd);
$url='download.php';
echo '<META HTTP-EQUIV=REFRESH CONTENT="0; '.$url.'">';

?>
