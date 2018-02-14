<?php
$ds          = DIRECTORY_SEPARATOR;  //1
session_start();
$storeFolder = 'uploads';   //2
$sessionFolder = $_SESSION['id'];
 
if (!empty($_FILES)) {
   $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
   $extention="pdf";
	if($file_ext == $extention){
   mkdir('uploads/'. $sessionFolder, 0700); 
   $tempFile = $_FILES['file']['tmp_name'];
      $_SESSION['count'] = $_SESSION['count'] + 1;
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
     
    $targetFile =  $targetPath. $sessionFolder. $ds. $_SESSION['count'].".pdf";
 
    move_uploaded_file($tempFile,$targetFile); //6
$cmd = "find uploads/ -type d -mmin +15| xargs rm -rf";
$output = shell_exec($cmd);

}
}
?>
