<?php
	require("inc/header.php");
?>
	
<!-- BEGIN CONTENT -->
<div class="page-container row-fluid">
	<?php
		require('inc/sidbar.php');
	?>
	<!-- BEGIN PAGE CONTAINER-->
	<div class="page-content"> 
		<div class="content">  
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">	
				<h3>Dashboard</h3>		
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PlACE PAGE CONTENT HERE -->
			<?php
			if (isset($_GET['page']) && $_GET['page'] == 'profile') {
				require("pages/profile.php");
			}elseif (isset($_GET['page']) && $_GET['page'] == 'competencie'){
				require("pages/compt.php");
			}elseif (isset($_GET['page']) && $_GET['page'] == 'education'){
				require("pages/education.php");
			}elseif (isset($_GET['page']) && $_GET['page'] == 'interest'){
				require("pages/interest.php");
			}elseif (isset($_GET['page']) && $_GET['page'] == 'lang'){
				require("pages/lang.php");
			}elseif (isset($_GET['page']) && $_GET['page'] == 'experience'){
				require("pages/experience.php");
			}elseif (isset($_GET['page']) && $_GET['page'] == 'modele'){
				require("pages/modele.php");
			}elseif (isset($_GET['page']) && $_GET['page'] == 'certificat'){
				require("pages/certificat.php");
			}else{
				require("pages/home.php");
			}
			?>
			<!-- END PLACE PAGE CONTENT HERE -->
		</div>
	</div>
	<!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 
<?php
	require('inc/footer.php');
?>