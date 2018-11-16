<?php
require("config.php");
if (isset($_POST['img'])) {
	$baseurl = $_POST['img'];
	$idu = $_POST['id'];
	
	$insertimg = mysqli_query($con,"UPDATE `photo` SET `PHOTO`='".$baseurl."' WHERE `ID_UTILISATEUR`='".$idu."'");
	//$insertimg = mysqli_query($con,"INSERT INTO `photo`(`ID_UTILISATEUR`, `PHOTO`) VALUES ('".$idu."','".$baseurl."')");

	if ($insertimg) {
		echo "image uploaded";
	}else{
		echo "noop";
	}

}
?>