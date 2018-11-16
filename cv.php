<?php require('inc/config.php'); ?>
<?php
	$id=$_GET['user'];
	$id=checkin($id);
	$id = mysqli_real_escape_string($con,$id);
	$select_user = mysqli_query($con,"SELECT * FROM utilisateur WHERE ID_UTILISATEUR = '".$id."'");
	$fetch_user = mysqli_fetch_assoc($select_user);

	$id = $fetch_user['ID_UTILISATEUR'];
	$nom = $fetch_user['NOM'];
	$prenom = $fetch_user['PRENOM'];
	$email = $fetch_user['EMAIL'];
	$desc = $fetch_user['ID_DESCRIPTION'];
	// UPDATE VIEW
	$n_view = mysqli_query($con,"UPDATE `utilisateur_cv_modele` SET `MODEL_VIEW`=`MODEL_VIEW`+1 WHERE `ID_UTILISATEUR`='".$id."'");

	// DESCRIPTION
	$selectdesc = mysqli_query($con,"SELECT * FROM `description` where ID_DESCRIPTION ='".$desc."'");

	$selectadd = mysqli_query($con,"SELECT * FROM `adresse` where ID_UTILISATEUR ='".$id."'");
	$uaddr = mysqli_fetch_assoc($selectadd);

	// COMPETENCE	
	$selectcomp = mysqli_query($con,"select * from competence where ID_UTILISATEUR='".$id."'");

	$selectinter = mysqli_query($con,"select * from interest where ID_UTILISATEUR='".$id."'");

	$selectlang = mysqli_query($con,"select * from utilisateur_langue where ID_UTILISATEUR='".$id."'");

	$selectphone=mysqli_query($con,"select * from `telephone` where ID_UTILISATEUR='".$id."'");

	$selectimg=mysqli_query($con,"select * from `photo` where ID_UTILISATEUR='".$id."'");
	$fetch_img = mysqli_fetch_assoc($selectimg);

	$seledtedu=mysqli_query($con,"select * from `education` where ID_UTILISATEUR='".$id."' ");


	$selectCert=mysqli_query($con,"select * from `certificat` where ID_UTILISATEUR='".$id."'");


	$selectExp=mysqli_query($con,"select * from `experience` where ID_UTILISATEUR='".$id."'");



	$getucv = mysqli_query($con,"SELECT * FROM `utilisateur_cv_modele`,`cv_modele` WHERE utilisateur_cv_modele.`ID_UTILISATEUR`='".$id."' and utilisateur_cv_modele.ID_MODELE=cv_modele.ID_MODELE");
	$cv = mysqli_fetch_assoc($getucv);

?>
<?php
include($cv['dir']);
?>