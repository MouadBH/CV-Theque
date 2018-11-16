
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nom." ".$prenom; ?> CV Online</title>
	<base href="http://localhost/proj/cv/modele/simple/" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://use.fontawesome.com/630e0444c2.js"></script>
	<!-- Font Awesome -->
    <link href="<?php echo $dir;?>font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo $dir;?>font-awesome.css" type="text/css" rel="stylesheet">
    


</head>
<body>
	<header>
		<div class="container">
			<div class="left def">
				<img src="<?php echo $fetch_img['PHOTO']; ?>" width="130" height="130" />
				<h1><?php echo $nom." ".$prenom; ?></h1>
			</div>
			<div class="def right" style="margin-top: 35px;">
				<h1>Contact</h1>
				<ul>
					<li><i class="fa fa-envelope-o"></i><?php echo $email; ?></li>
					<?php
					while ($uphone = mysqli_fetch_assoc($selectphone)) {
						echo '
						<li><i class="fa fa-phone" aria-hidden="true"></i>'.$uphone['TELEPHONE'].'</li>
						';
					}
					?>
					
					<li>
						<i class="fa fa-map-marker" aria-hidden="true"></i>
						<?php echo $uaddr['RUE'].", ".$uaddr['VILLE'].", ".$uaddr['PAYE']; ?>
					</li>
				</ul>
			</div>
			
		</div>
	</header>
	<main class="container wall">
		<div class="left section">
			<div class="item">
				<h3><i class="fa fa-user-circle-o" aria-hidden="true"></i>A PROPOS DE MOI</h3>
				<div class="box">
					<?php
					while($udesc = mysqli_fetch_assoc($selectdesc)){
						echo "<p>".$udesc['DESCRIPTION']."</p>";
					}
					?>
				</div>
			</div>
			<div class="item">
				<h3><i class="fa fa-th-list" aria-hidden="true"></i>COMPETENCES</h3>
				<div>
					<ul>
					<?php
					while($ucomp = mysqli_fetch_assoc($selectcomp)){
						$fi = $ucomp['NIVEAU']/10;
						$vi = 10-$fi;
						echo '
						<li>
							'.$ucomp['LIBELLE'].'
							<div>';

							for ($i=0; $i < $fi ; $i++) { 
								echo '<span class="bar"></span>';
							}
							for ($i=0; $i < $vi ; $i++) { 
								echo '<span id="vid" class="bar"></span>';
							}
							echo '
							</div>
						</li>
						';
					}
					?>
					</ul>
				</div>
			</div>
			<div class="item">
				<h3><i class="fa fa-graduation-cap" aria-hidden="true"></i>CERTIFICAT</h3>

				<?php
				while($CERT=mysqli_fetch_assoc($selectCert)) {
						//selectioner AUTEUR et LIBELLE from ici
						$CERT_exact=mysqli_query($con,"select * from Certificat where ID_UTILISATEUR='".$id."' and ID_CERTIFICAT='".$CERT['ID_CERTIFICAT']."' ");
						$feduex = mysqli_fetch_assoc($CERT_exact);
						//selectionner les datesfrom ici
						$CERT_DATE=mysqli_query($con,"select * from generale_date where ID_DATE='".$feduex['ID_DATE']."'");
						$fedb = mysqli_fetch_assoc($CERT_DATE);
						
						#//selectioner la desciption ici
						$CERT_desc=mysqli_query($con,"select * from `description` where ID_DESCRIPTION='".$CERT['ID_DESCRIPTION']."'");
						$ded = mysqli_fetch_assoc($CERT_desc);

						echo '
						<div class="box">
							<span>'.substr($fedb['DATE'],0,4).'</span>
							<p>
								'.$feduex['AUTEUR'].' -
								'.$feduex['LIBELLE'].'<br>
								'.$ded['DESCRIPTION'].'
							</p>
						</div>
						';
						
					}
				?>
			</div>
		</div>
		<div class="right section">
			<div class="item">
				<h3><i class="fa fa-graduation-cap" aria-hidden="true"></i>EDUCATION</h3>

				<?php
				while ($EDU=mysqli_fetch_assoc($seledtedu)) {
						//selectioner INSTITUT et LIBELLE from ici
						$EDU_exact=mysqli_query($con,"select * from `education` where ID_UTILISATEUR='".$id."' and ID_EDUCATION='".$EDU['ID_EDUCATION']."' ");
						$feduex = mysqli_fetch_assoc($EDU_exact);
						//selectioner les datesfrom ici
						$EDU_Date_debut=mysqli_query($con,"select * from generale_date where ID_DATE='".$EDU['ID_DATE_DEBUT']."'");
						$fedb = mysqli_fetch_assoc($EDU_Date_debut);
						$EDU_Date_fin=mysqli_query($con,"select * from generale_date where ID_DATE='".$EDU['ID_DATE_FIN']."'");
						$dedf = mysqli_fetch_assoc($EDU_Date_fin);
						//selectioner la desciption ici
						$EDU_desc=mysqli_query($con,"select * from `description` where ID_DESCRIPTION='".$EDU['ID_DESCRIPTION']."'");
						$ded = mysqli_fetch_assoc($EDU_desc);

						echo '
						<div class="box">
							<span>'.substr($fedb['DATE'],0,4).'-'.substr($dedf['DATE'],0,4).'</span>
							<p>
								'.$feduex['LIBELLE'].' -
								'.$feduex['INSTITUT'].'<br>
								'.$ded['DESCRIPTION'].'
							</p>
						</div>
						';
						
					}
				?>
			</div>
			<div class="item">
				<h3><i class="fa fa-briefcase" aria-hidden="true"></i>L'EXPERIENCE</h3>
				<?php
				while ($EXP=mysqli_fetch_assoc($selectExp)) {
						//selectioner LIEU EXPERINECE et ROLE from ici
						$EXP_exact=mysqli_query($con,"select * from `experience` where ID_UTILISATEUR='".$id."' and ID_EXPERIENCE='".$EXP['ID_EXPERIENCE']."' ");
						$feduex = mysqli_fetch_assoc($EXP_exact);
						//selectioner les dates from ici
						$EXP_Date_debut=mysqli_query($con,"select * from generale_date where ID_DATE='".$EXP['ID_DATE_DEBUT']."'");
						$fedb = mysqli_fetch_assoc($EXP_Date_debut);

						$EXP_Date_fin=mysqli_query($con,"select * from generale_date where ID_DATE='".$EXP['ID_DATE_FIN']."'");
						$dedf = mysqli_fetch_assoc($EXP_Date_fin);
						//selectioner la desciption ici
						$EXP_desc=mysqli_query($con,"select * from `description` where ID_DESCRIPTION='".$EXP['ID_DESCRIPTION']."'");
						$ded = mysqli_fetch_assoc($EXP_desc);

						echo '
						<div class="box">
							<span>'.substr($fedb['DATE'],0,4).'-'.substr($dedf['DATE'],0,4).'</span>
							<p>
								'.$feduex['LIEU_EXPERIENCE'].' -
								'.$feduex['ROLE'].'<br>
								'.$ded['DESCRIPTION'].'
							</p>
						</div>
						';
						
					}
				?>
			</div>
			<div class="item">
				<h3><i class="fa fa-language" aria-hidden="true"></i>LANGUES</h3>
				<div>
					<ul>
						<?php
						while ($ulang = mysqli_fetch_assoc($selectlang)) {
							echo '
							<li>
								'.$ulang['LANGUE'].'
								<div class="progress">
									<div class="barin" style="width: '.$ulang['LANGUE_NIVEAU'].'%;"></div>
								</div>
							</li>
							';
						}
						?>
						
					</ul>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<div class="container">
			<h2>Loisirs</h2>
			<div class="menu">
				<ul>
					<?php
						while ($uint = mysqli_fetch_assoc($selectinter)) {
							echo '
							<li>'.$uint['LIBELLE'].'</li>
							';
						}
						?>
				</ul>
			</div>
		</div>
	</footer>
</body>
</html>