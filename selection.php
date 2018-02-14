<?php

session_start();
$file = "uploads/".$_SESSION['id']."/1.pdf";
$file2 = "uploads/".$_SESSION['id']."/2.pdf";
if (file_exists($file2)){
$html = <<< XYZ
<form id="myform" name="merger" action="merge.php" method="post">
<input type="checkbox" name="merge" value="merge" checked>
</form>
<script type="text/javascript">
document.getElementById('myform').submit();
</script>
XYZ;
echo $html;

}else{
$cmd = "pdftk ".$file." dump_data | grep NumberOfPages";
$output = shell_exec($cmd);
$totalPages = substr($output,15);
$_SESSION["pages"] = $totalPages;
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
.center {
height: auto;
padding-left: 12%;}
</style>
</head>
<body>
XYZ;
echo $html;
if (file_exists($file)){
$html = <<< XYZ
<div class="center">
<h1 class="custom"> Select Pages to Remove </h1>

<form name="selection" action="remove.php" method="post">
<p>
<ul>
XYZ;
echo $html;
for($x=1; $x <= $totalPages; $x++){
$y=$x-1;
echo " <li> <label class='fancy-checkbox-label'>";
echo " <input type='checkbox' name=".$x." id=".$x."value=".$x." />";
echo " <span class='fancy-checkbox fancy-checkbox-img'></span>";
echo " <img style='height=150px; width=150px;' src='pdftojpg.php?page=".$y."'></li>";
echo "</label>";
}
$html = <<< XYZ
</p>
</ul>
</div>
<nav class="cl-effect-7">
<ul>
    <li>  <a  href="/" datahover="Home">Home</a> </li>
	<li> <a href="#"datahover="Remove Pages" onclick="document.selection.submit()">Remove Pages</a> </li>
</ul>
                              </nav>
</form>
</body>
</html>
XYZ;
echo $html;
}else {
$html = <<< XYZ
<div class="center">
<h1 class="custom"> No File Uploaded </h1>
</div>
<nav class="cl-effect-7">
<ul>
    <li>  <a  href="/" datahover="Home">Home</a> </li>
</ul>
                              </nav>
</body>
</html>
XYZ;
echo $html;
}
}
?>
