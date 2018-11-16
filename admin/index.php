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
			if (isset($_GET['page']) && $_GET['page'] == 'user') {
				require("pages/user.php");
			}elseif (isset($_GET['page']) && $_GET['page'] == 'modele'){
				require("pages/modele.php");
			}elseif (isset($_GET['page']) && $_GET['page'] == 'addmodele'){
				require("pages/addmodele.php");
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