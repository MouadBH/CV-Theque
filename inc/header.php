<?php require('inc/config.php'); ?>
<?php
if(isset($_SESSION['userid'])){
	$loggedin = 1;
	$loggeduser = $_SESSION['userid'];
		
	$select_user = mysqli_query($con,"SELECT * FROM utilisateur WHERE ID_UTILISATEUR = '".$loggeduser."'");
	$fetch_user = mysqli_fetch_assoc($select_user);

	$id = $fetch_user['ID_UTILISATEUR'];
	$nom = $fetch_user['NOM'];
	$prenom = $fetch_user['PRENOM'];
	$email = $fetch_user['EMAIL'];
	$pass = $fetch_user['PASSWORD'];
	$desc = $fetch_user['ID_DESCRIPTION'];

	$uimg = mysqli_query($con,"SELECT * FROM `photo` WHERE `ID_UTILISATEUR`='".$id."'");
	$img = mysqli_fetch_assoc($uimg);
	$uimg = $img['PHOTO'];

	$selectadd = mysqli_query($con,"SELECT * FROM `adresse` where ID_UTILISATEUR ='".$id."'");
	$uaddr = mysqli_fetch_assoc($selectadd);
	$rue = $uaddr['RUE'];
	$ville = $uaddr['VILLE'];
	$pay = $uaddr['PAYE'];

	if(isset($_GET['action']) && $_GET['action'] == 'logout'){
								
		unset($_SESSION['userid']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;						
	}

}else {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CV-Théque | <?php echo $nom." ".$prenom ?> </title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<base href="http://localhost/proj/cv/" >
    
	<link href="assets2/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets2/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
	<link href="assets2/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets2/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets2/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
	<link href="assets2/css/animate.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets2/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="assets2/css/responsive.css" rel="stylesheet" type="text/css"/>
	<link href="assets2/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
	<link href="assets2/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets2/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets2/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
	<link href="assets2/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
	<link href="assets2/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="assets2/plugins/ios-switch/ios7-switch.css" type="text/css" media="screen">
	<link href="assets2/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
	<link href="assets2/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="assets2/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen">
	<link rel="stylesheet" href="assets2/plugins/jquery-morris-chart/css/morris.css" type="text/css" media="screen">
	

    <!-- Custom styles for this template -->
    <link href="crop/css/croppic.css" rel="stylesheet">
    
</head>
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse"> 
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="navbar-inner">
		<!-- BEGIN NAVIGATION HEADER -->
		<div class="header-seperation"> 
			<!-- BEGIN MOBILE HEADER -->
			<ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
				<li class="dropdown">
					<a id="main-menu-toggle" href="#main-menu" class="">
						<div class="iconset top-menu-toggle-white"></div>
					</a>
				</li>		 
			</ul>
			<!-- END MOBILE HEADER -->
			<!-- BEGIN LOGO -->	
			<a href="dashboard">
				<img src="assets2/img/logo.png" class="logo" alt="" data-src="assets2/img/logo.png" data-src-retina="assets2/img/logo2x.png" width="106" height="21"/>
			</a>
			<!-- END LOGO --> 
		</div>
		<!-- END NAVIGATION HEADER -->
		<!-- BEGIN CONTENT HEADER -->
		<div class="header-quick-nav"> 
			<!-- BEGIN HEADER RIGHT SIDE SECTION -->
			<div class="pull-right"> 
				<div class="chat-toggler">	
					<!-- BEGIN NOTIFICATION CENTER -->
					<a href="user/<?php echo $id ?>" class="dropdown-toggle tip" id="my-task-list" data-toggle="tooltip" title="REVUE"  data-placement="left">
						<div class="user-details"> 
							<div class="username">
								<span class="badge" style="background: #1b1e24;color: #fff;"><i class="fa fa-eye"></i></span>&nbsp;<?php echo $nom; ?><span class="bold">&nbsp;<?php echo $prenom; ?></span>
							</div>						
						</div> 
						<div class="iconset"></div>
					</a>
					<!-- END NOTIFICATION CENTER -->
					<!-- BEGIN PROFILE PICTURE -->
					<div class="profile-pic"> 
						<img src="<?php echo $uimg; ?>" alt="" data-src="<?php echo $uimg; ?>" data-src-retina="<?php echo $uimg; ?>" width="35" height="35" /> 
					</div>  
					<!-- END PROFILE PICTURE -->     			
				</div>
				<!-- BEGIN HEADER NAV BUTTONS -->
				<ul class="nav quick-section">
					<!-- BEGIN SETTINGS -->
					<li class="quicklinks"> 
						<a data-toggle="dropdown" class="dropdown-toggle pull-right" href="#" id="user-options">						
							<div class="iconset top-settings-dark"></div> 	
						</a>
						<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="user-options">
							<li><a href="dashboard?page=profile">Mon compte</a></li>
							<li><a href="dashboard">Dashboard</a></li>
							<li class="divider"></li>                
							<li><a href="logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
						</ul>
					</li>
					<!-- END SETTINGS -->
				</ul>
				<!-- END HEADER NAV BUTTONS -->
			</div>
			<!-- END HEADER RIGHT SIDE SECTION -->
		</div> 
		<!-- END CONTENT HEADER --> 
	</div>
	<!-- END TOP NAVIGATION BAR --> 
</div>
<!-- END HEADER -->