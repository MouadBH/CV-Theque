<?php require('../inc/config.php'); ?>
<?php
if(isset($_SESSION['admin'])){
	$loggedin = 1;
	$loggeduser = $_SESSION['admin'];
		
	$select_adm = mysqli_query($con,"SELECT * FROM admin WHERE ID_ADMIN = '".$loggeduser."'");
	$fetch_adm = mysqli_fetch_assoc($select_adm);

	$id = $fetch_adm['ID_ADMIN'];
	$nom = $fetch_adm['U_ADMIN'];
	$email = $fetch_adm['E_ADMIN'];

	if(isset($_GET['action']) && $_GET['action'] == 'logout'){
								
		unset($_SESSION['admin']);
		session_unset();
		session_destroy();
		header("Location: login.php");
		exit;						
	}

}else {
	header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CV-Théque - <?php echo $nom; ?> - Administrateur</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<base href="http://localhost/proj/cv/admin/" >
    
	<link href="../assets2/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="../assets2/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
	<link href="../assets2/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../assets2/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="../assets2/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
	<link href="../assets2/css/animate.min.css" rel="stylesheet" type="text/css"/>
	<link href="../assets2/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="../assets2/css/responsive.css" rel="stylesheet" type="text/css"/>
	<link href="../assets2/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
	<link href="../assets2/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="../assets2/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="../assets2/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
	<link href="../assets2/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
	<link href="../assets2/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../assets2/plugins/ios-switch/ios7-switch.css" type="text/css" media="screen">
	<link href="../assets2/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
	<link href="../assets2/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="../assets2/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../assets2/plugins/jquery-morris-chart/css/morris.css" type="text/css" media="screen">
    
    <link href="../assets2/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets2/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="../assets2/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
	

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
				<img src="../assets2/img/logo.png" class="logo" alt="" data-src="../assets2/img/logo.png" data-src-retina="../assets2/img/logo2x.png" width="106" height="21"/>
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
					<a href="index.php?action=logout">
						<div class="user-details"> 
							<div class="username">
								<span class="badge" style="background: #1b1e24;color: #fff;"><?php echo $nom; ?></span>
							</div>						
						</div> 
						<div class="iconset"></div>
					</a>
					<!-- END NOTIFICATION CENTER -->    			
				</div>

			</div>
			<!-- END HEADER RIGHT SIDE SECTION -->
		</div> 
		<!-- END CONTENT HEADER --> 
	</div>
	<!-- END TOP NAVIGATION BAR --> 
</div>
<!-- END HEADER -->