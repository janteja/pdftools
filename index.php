<?php
session_start();
$_SESSION["id"] = bin2hex(random_bytes(22));
$_SESSION["count"] = 0;
$html = <<<XYZ
<html>
 
<head>   
 <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
 <link rel="stylesheet" type="text/css" href="css/demo.css" />
 <link rel="stylesheet" type="text/css" href="css/component.css"/>
 <script src="js/modernizr.custom.js"></script> 
<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
 
<script src="js/dropzone.js"></script>
<style>
body {
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
 <div>
<form action="upload.php" class="dropzone"></form> 
</div>
                   <nav class="cl-effect-7">

<ul>
    <li>  <a href="merge.php" datahover="Merge">Merge</a> </li>
        <li>  <a href="selection.php" id="remove"datahover="Remove Pages">Remove Pages</a> </li>
	<li> <a href="compress.php" id="compress" datahover="Compress">Compress</a> </li>
</ul>
                              </nav>

</body>
</html>
XYZ;
echo $html;
?>
