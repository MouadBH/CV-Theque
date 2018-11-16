<!-- BEGIN SIDEBAR -->
	<!-- BEGIN MENU -->
	<div class="page-sidebar" id="main-menu"> 
		  <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
		<!-- BEGIN MINI-PROFILE -->
		<div class="user-info-wrapper">	
			<div class="user-info m-t-20">
				<div class="greeting">Bienvenue</div>
				<div class="username"><?php echo $nom; ?></div>
			</div>
		</div>
		<!-- END MINI-PROFILE -->
		<!-- BEGIN SIDEBAR MENU -->	
		<p class="menu-title"></p>
		<ul>	
			<!-- BEGIN SELECTED LINK -->
			<li class="<?php if(!isset($_GET['page'])){echo "start active";}else{echo"";} ?>">
				<a href="index.php">
					<i class="icon-custom-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
				</a>
			</li>
			<!-- END SELECTED LINK -->
			<!-- BEGIN BADGE LINK -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'user'){echo "start active";} ?>">
				<a href="index.php?page=user">
					<i class="fa fa-user"></i>
					<span class="title">Utilisateur</span>
				</a>
			</li>
			<!-- END BADGE LINK -->     
			<!-- BEGIN SINGLE LINK -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'modele'){echo "start active";} ?>">
				<a href="index.php?page=modele">
					<i class="fa fa-flag"></i>
					<span class="title">Modeles</span>

				</a>
			</li>
			<!-- END SINGLE LINK -->  
			<!-- BEGIN SINGLE LINK -->
			<li class="<?php if(isset($_GET['page']) and $_GET['page'] == 'addmodele'){echo "start active";} ?>">
				<a href="index.php?page=addmodele">
					<i class="fa fa-graduation-cap fa-lg"></i>
					<span class="title">Ajouté Modeles</span>
				</a>
			</li>
			<!-- END SINGLE LINK -->  	
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