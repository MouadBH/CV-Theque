<?php
	require_once('inc/config.php');

	if(isset($_SESSION['userid'])){
		redirect("dash.php");
	}
?>
<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CV-Théque Crée votre cv</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="Mouad Boualhdoud & Mouhamed Wadie El Mohtadi" name="author" />

<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.theme.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/headereffects/css/component.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/headereffects/css/normalize.css" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/rs-plugin/css/settings.css" media="screen" />


<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/magic_space.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->

<script type="text/javascript" src="assets/plugins/jquery-1.8.3.min.js"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="assets/plugins/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/plugins/rs-plugin/css/settings.css" media="screen" />

</head>
<!-- END HEAD -->
<body>
<div class="main-wrapper">

			<header id="ha-header" class="ha-header ha-header-hide "  >
				<div class="ha-header-perspective">
					<div class="ha-header-front navbar navbar-default">
					  <div class="compressed">
						<div class="navbar-header">
						  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <a href="#" class="navbar-brand compressed"><img src="assets/img/logo_condensed.png" alt="" data-src="assets/img/logo_condensed.png" data-src-retina="assets/img/logo2x.png" width="119" height="22"/></a>
						</div>
						<div class="navbar-collapse collapse">
						  <ul class="nav navbar-nav navbar-right" >
							<li ><a href="index.php">Home</a></li>
							<li><a href="login.php">S'inscrire</a></li>
							<li ><a href="login.php">Se Connecter</a></li>
						  </ul>
						</div><!--/.nav-collapse -->
					  </div>
			
					</div>
				</div>
			</header>
	
<div class="section ha-waypoint"  data-animate-down="ha-header-hide" data-animate-up="ha-header-hide">
<div role="navigation" class="navbar navbar-transparent navbar-top">
     <div class="container"> 
	  <div class="compressed">
        <div class="navbar-header">
		   <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand"><img src="assets/img/logo.png" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="119" height="22" alt=""/></a>		 
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" >
			<li ><a href="index.php">Home</a></li>
							
							<li><a href="login">S'inscrire</a></li>
							<li ><a href="login">Se Connecter</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>
	<!--BEGIN SLIDER -->
	<div class="tp-banner-container">
		<div class="tp-banner" id="home" >
			<ul>
				<!-- SLIDE  -->
				<li data-transition="fade" data-slotamount="5" data-masterspeed="700" >
					<!-- MAIN IMAGE -->
					<img src="assets/img/bg/slide_one.jpg"   alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">


					<!-- LAYERS -->
					<div class="tp-caption mediumlarge_light_white_center sft tp-resizeme slider"
							data-x="center" data-hoffset="0"
							data-y="60"
							data-speed="500"
							data-start="800"
							data-easing="Power4.easeOut"
							data-endspeed="300"
							data-endeasing="Power1.easeIn"
							data-captionhidden="off"
							style="z-index: 6"><h2 class="text-white custom-font title ">Créer un CV <br> Eremarquable en quelques minutes</h2>

					</div>
					<div class="tp-caption sfb slider tp-resizeme slider"
						data-x="center"
						data-hoffset="0"
						data-y="240"
						data-speed="800"
						data-start="1000"
						data-easing="Power4.easeOut"
						data-endspeed="300"
						data-endeasing="Power1.easeIn"
						data-captionhidden="off"
						style="z-index: 6">	<a href="login" class="btn btn-purple btn-lg  btn-large m-r-10">Créer un compte</a>
					</div>
					<div class="tp-caption fade slider tp-resizeme slider"
						data-x="center"
						data-hoffset="0"
						data-y="300"
						data-speed="500"
						data-start="800"
						data-easing="Power4.easeOut"
						data-endspeed="300"
						data-endeasing="Power1.easeIn"
						data-captionhidden="off"
						style="z-index: 6">	<a href="login" class="text-white m-r-10">or Login</a>
					</div>
				</li>					
				<li data-transition="fade" data-slotamount="5" data-masterspeed="700" >
					<!-- MAIN IMAGE -->
					<img src="assets/img/bg/picture-1.jpg"   alt="slidebg2"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

					<!-- LAYERS -->
					<div class="tp-caption mediumlarge_light_white_center sft tp-resizeme slider"
							data-x="center" data-hoffset="0"
							data-y="60"
							data-speed="500"
							data-start="800"
							data-easing="Power4.easeOut"
							data-endspeed="300"
							data-endeasing="Power1.easeIn"
							data-captionhidden="off"
							style="z-index: 6"><h2 class="text-white custom-font title ">Réinventez votre CV en moins de 10 minutes<br> pour se faire embaucher plus rapidement.</h2>

					</div>
					<div class="tp-caption sfb slider tp-resizeme slider"
						data-x="center"
						data-hoffset="0"
						data-y="240"
						data-speed="800"
						data-start="1000"
						data-easing="Power4.easeOut"
						data-endspeed="300"
						data-endeasing="Power1.easeIn"
						data-captionhidden="off"
						style="z-index: 6">	<a href="login.php" class="btn btn-danger btn-lg  btn-large m-r-10">Créez un CV</a>
					</div>
					
				</li>	
			</ul>
			<div class="tp-bannertimer"></div>
		</div>
	</div>
	<!--END SLIDER
		
	-->
			

	
</div>
<div class="section ">
	<div class="container">
		<div class="p-t-40 p-b-40">
			<h2 class="text-center">Créez votre <span class="semi-bold">CV</span>, nous avons <span class="semi-bold">pensé à tout</span>  <a href="login" class="btn btn-purple btn-lg  btn-large m-r-10">Se Connecter</a></h2>
		</div>
	</div>
</div>	
<div class="section white ha-waypoint"  data-animate-down="ha-header-color" data-animate-up="ha-header-hide" >
		<div class="container">
		<div class="p-t-60">
		<div class="row">
		<div class="col-md-12 feature-list ">
			<div class="col-md-4 " data-ride="animated" data-animation="fadeIn" data-delay="300">
			<h4 class="title">Choisissez votre design</h4>
			<p>
			Que ce soit un portefeuille web mind-blowing ou PDF professionnel, chaque modèle VisualCV est conçu avec soin pour vous de l'application à l'entrevue.
			</p>
			</div>
			<div class="col-md-4" data-ride="animated" data-animation="fadeIn" data-delay="600">
			<h4 class="title">Créer des versions personnalisées</h4>
			<p>
			Dans le marché concurrentiel d'aujourd'hui, la personnalisation est la clé. Gérez facilement les versions VisualCV multiples, personnalisées pour chaque application.
			</p>
			</div>
			<div class="col-md-4" data-ride="animated" data-animation="fadeIn" data-delay="900">
			<h4 class="title">Suivre les résultats</h4>
			<p>
			Obtenez un aperçu de votre réussite professionnelle avec l'analyse VisualCV, et se mettre à jour lorsque votre CV est affiché lorsque votre CV est consulté ou téléchargé.
			</p>
			</div>
		</div>
		</div>
		<div class="section relative">
			<div class="row">

				<img src="assets/img/browser.png" alt="" class="resize p-t-60 col-md-9 hidden-xs" style="" data-ride="animated" data-animation="fadeInUp" data-delay="300">
				
			
		
			</div>
		</div>
			<div class="clearfix"></div>
		</div>
		</div>
		</div>

<div class="section grey">
	<div class="container">
	  <div class="p-t-40 p-b-50 ">
		<div class="row">
			<div class="col-md-12">
			  <h2><span class="normal">Le modèle idéal pour l'emploi</span></h2>
			  <h3>Les diplômés récents, PDG, pigistes, et tous les emplois entre les deux </h3>
			</div>
		</div>
		<br>
		<div class="portfolio-grid portfolioContainer " name="theme">
		  <ul id="thumbs" class="col3">
		  	<?php 
		  	$getcv = mysqli_query($con,"SELECT * FROM `cv_modele`");
		  	while ($cv = mysqli_fetch_assoc($getcv)) {
		  	
		  	?>
		    <li class="item web">
		      <div class="portfolio-image-wrapper"> <img src="<?php echo $cv['img']; ?>" alt="" />
		        <div class="item-info-overlay">
		          <div style="margin-top: 26%;">
		            <a href="" style="color: #fff;">
                        <i class="fa fa-file-text-o" style="font-size: 86px;margin: 25px;"></i>
                      </a>
		          </div>
		        </div>
		      </div>
		      <div class="item-info">
		        <h4 class="text-dark no-margin p-t-10 title semi-bold"><?php echo $cv['MODELE']; ?></h4>
		        
		      </div>
		      <!--END ITEM-INFO-->
		      <div class="clearfix"></div>
		    </li>
		    <?php } ?>
		  </ul>
		</div>
		</div>
	</div>
</div>	

<div class="section table-layout">	
			<div id="working-section" class="table-cell v-middle">	
				<div >
				<h2 class="text-white text-center custom-font no-margin">DES MILLIONS DE CLIENTS SATISFAITS</h2>
				</div>
			</div>
</div>
<div class="section black">
		<div class="container">
			<div class="p-t-60 p-b-60">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="text-center text-white m-b-30">Faites votre prochain choix de carrière avec  <span class="semi-bold">confiance</span> .</h2>
					</div>					
				</div>
				
			</div>
		</div>
</div>
<div class="section white footer">
		<div class="container">
			<div class="p-t-20 p-b-20">
				<div class="row">
					<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12 xs-m-b-20">
					<img src="assets/img/logo_condensed.png" alt="" data-src="assets/img/logo_condensed.png" data-src-retina="assets/img/logo2x.png" width="119" height="22"/>
					</div>
					
					<div class="col-md-2 col-lg-2 col-sm-2  col-xs-12 xs-m-b-20 m-t-10" style="float: right;">
						Copyright © 2018
						Privacy Policy
					</div>
				</div>
			</div>
		</div>
</div>
</div>
		

<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="assets/plugins/waypoints.min.js"></script>
<script type="text/javascript" src="assets/plugins/parrallax/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-nicescroll/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-appear/jquery.appear.js"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script> 
<script type="text/javascript" src="assets/js/core.js"></script>

<!-- BEGIN JS PLUGIN -->
<script type="text/javascript" src="assets/plugins/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/plugins/modernizr.custom.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-isotope/jquery.isotope.js"></script>
<!-- END JS PLUGIN -->


</body>