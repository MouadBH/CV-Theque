<!-- BEGIN SIDEBAR -->
	<!-- BEGIN MENU -->
	<div class="page-sidebar" id="main-menu"> 
		  <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
		<!-- BEGIN MINI-PROFILE -->
		<div class="user-info-wrapper">	
			<div class="profile-wrapper">
				<img src="<?php echo $uimg; ?>" alt="" data-src="<?php echo $uimg; ?>" data-src-retina="<?php echo $uimg; ?>" width="69" height="69" />
			</div>
			<div class="user-info m-t-20">
				<div class="greeting">Bienvenue</div>
				<div class="username"><?php echo $nom; ?> <span class="semi-bold"><?php echo $prenom; ?></span></div>
			</div>
		</div>
		<!-- END MINI-PROFILE -->
		<!-- BEGIN SIDEBAR MENU -->	
		<p class="menu-title"></p>
		<ul>	
			<!-- BEGIN SELECTED LINK -->
			<li class="<?php if(!isset($_GET['page'])){echo "start active";}else{echo"";} ?>">
				<a href="dashboard">
					<i class="icon-custom-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
				</a>
			</li>
			<!-- END SELECTED LINK -->
			<!-- BEGIN BADGE LINK -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'profile'){echo "start active";} ?>">
				<a href="dashboard?page=profile">
					<i class="fa fa-user"></i>
					<span class="title">Profile</span>
				</a>
			</li>
			<!-- END BADGE LINK -->     
			<!-- BEGIN SINGLE LINK -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'competencie'){echo "start active";} ?>">
				<a href="dashboard?page=competencie">
					<i class="fa fa-flag"></i>
					<span class="title">Competencies</span>

				</a>
			</li>
			<!-- END SINGLE LINK -->  
			<!-- BEGIN SINGLE LINK -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'education'){echo "start active";} ?>">
				<a href="dashboard?page=education">
					<i class="fa fa-graduation-cap fa-lg"></i>
					<span class="title">Education</span>
				</a>
			</li>
			<!-- END SINGLE LINK -->  
			<!-- BEGIN SINGLE LINK -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'interest'){echo "start active";} ?>">
				<a href="dashboard?page=interest">
					<i class="fa fa-heart fa-lg"></i>
					<span class="title">Interest</span>
				</a>
			</li>
			<!-- END SINGLE LINK -->
			<!-- BEGIN SINGLE LINK -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'certificat'){echo "start active";} ?>">
				<a href="dashboard?page=certificat">
					<i class="fa fa-certificate fa-lg"></i>
					<span class="title">Certificat</span>
				</a>
			</li>
			<!-- END SINGLE LINK -->
			<!-- BEGIN SINGLE LINK -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'lang'){echo "start active";} ?>">
				<a href="dashboard?page=lang">
					<i class="fa fa-globe fa-lg"></i>
					<span class="title">Languages</span>
				</a>
			</li>
			<!-- END SINGLE LINK -->  
			<!-- BEGIN ONE LEVEL MENU -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'experience'){echo "start active";} ?>">
				<a href="dashboard?page=experience">
					<i class="fa fa-briefcase fa-lg"></i>
					<span class="title">Experience</span>
				</a>
			</li>
			<!-- END ONE LEVEL MENU -->
			<!-- BEGIN ONE LEVEL MENU -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'modele'){echo "start active";} ?>">
				<a href="dashboard?page=modele">
					<i class="fa fa-file-text-o fa-lg"></i>
					<span class="title">CV Modele</span>
				</a>
			</li>
			<!-- END ONE LEVEL MENU -->		
		</ul>
		<!-- END SIDEBAR MENU -->
		<div class="clearfix"></div>
		<!-- END SIDEBAR WIDGETS --> 
	</div>
	</div>
	<!-- BEGIN SCROLL UP HOVER -->
	<a href="#" class="scrollup">Scroll</a>
	<!-- END SCROLL UP HOVER -->
	<!-- END MENU -->
<!-- END SIDEBAR --> 