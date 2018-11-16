<?php
	require('inc/config.php');

	if(isset($_SESSION['userid'])){
		redirect("dashboard");
	}

	if (isset($_POST['sing'])) {
		$fname  = $_POST['name'];
		$lname = $_POST['prenom'];
		$pass = $_POST['pass'];
		$conpass = $_POST['copass'];
		$email = $_POST['email'];
		
				$fname = trim($fname);
				$fname = strip_tags($fname);
				$fname = htmlspecialchars($fname);

				$lname = trim($lname);
				$lname = strip_tags($lname);
				$lname = htmlspecialchars($lname);
				
				$email = trim($email);
				$email = strip_tags($email);
				$email = htmlspecialchars($email);
				
				$pass = trim($pass);
				$pass = strip_tags($pass);
				$pass = htmlspecialchars($pass);

				$conpass = trim($conpass);
				$conpass = strip_tags($conpass);
				$conpass = htmlspecialchars($conpass);
				
				$error = false;
				if(empty($fname) or empty($lname)){
					$error = true;
					$_SESSION['err_msg'] = "S'il vous plaît entrez votre nom.";
					header("Location: login.php?err=name");
					exit();
				}elseif(!preg_match("/^[a-zA-Z ]+$/",$fname) or !preg_match("/^[a-zA-Z ]+$/",$lname)){
					$error = true;
					$_SESSION['err_msg'] = 'Nom incorrect.';
					header("Location: login.php?err=name");
				}
				
				if ( !filter_var($email,FILTER_VALIDATE_EMAIL) or empty($email) ) {
					$error = true;
					$_SESSION['err_msg'] = "Veuillez entrer une adresse email valide.";
		            header("Location: login.php?err=email");
				} else {
					$check_email = mysqli_query($con, "SELECT * FROM utilisateur WHERE email='".$email."'");
					if(mysqli_num_rows($check_email) > 0){
						$error = true;
						$_SESSION['err_msg'] = "Cet email est déjà utilisé.";
		                header("Location: login.php?err=email");
					}
				}
				
				if (empty($pass) or empty($conpass)){
					$error = true;
					$_SESSION['err_msg'] = "Veuillez entrer le mot de passe.";
		            header("Location: login.php?err=pass");
		        }elseif ($pass != $conpass) {
		        	$error = true;
					$_SESSION['err_msg'] = "Mot de passe ne correspond pas.";
		            header("Location: login.php?err=pass");
				} elseif(strlen($pass) < 6) {
					$error = true;
					$_SESSION['err_msg'] = "Le mot de passe doit comporter au moins 6 caractères.";
		            header("Location: login.php?err=pass");
				}else{
					$pass = hash('sha256', $pass);
				}
				
				if( !$error ) {
					$res = mysqli_query($con, "INSERT INTO utilisateur (`NOM`,`PRENOM`,`EMAIL`,`PASSWORD`) VALUES('".$fname."','".$lname."','".$email."','".$pass."')");
					if ($res){
						$getlastuser = mysqli_query($con,"SELECT * FROM `utilisateur` ORDER by `ID_UTILISATEUR` DESC LIMIT 1");
						$idu = mysqli_fetch_assoc($getlastuser);
						$imged = mysqli_query($con,"INSERT INTO `photo`(`ID_UTILISATEUR`) VALUES ('".$idu['ID_UTILISATEUR']."')");
						$getmod = mysqli_query($con,"SELECT * FROM `cv_modele` ORDER by `ID_MODELE` ASC LIMIT 1");
						$idmod = mysqli_fetch_assoc($getmod);

						$setmodel = mysqli_query($con,"INSERT INTO `utilisateur_cv_modele`(`ID_UTILISATEUR`, `ID_MODELE`) VALUES ('".$idu['ID_UTILISATEUR']."','".$idmod['ID_MODELE']."')");
						
						$error = false;
						$_SESSION['suc_msg'] = "Enregistré avec succès, vous pouvez vous connecter maintenant";
						unset($fname);
						unset($lname);
						unset($email);
						unset($pass);
						unset($conpass);
						$getid = mysqli_query($con,"select * from utilisateur order by ID_UTILISATEUR desc limit 1");
						$id = mysqli_fetch_assoc($getid);
						$_SESSION['userid'] = $idu['ID_UTILISATEUR'];
						$_SESSION['valid'] = true;
						header("Location: dashboard");
						exit();
					} else {
						$error = true;
						$_SESSION['err_msg'] = "Quelque chose s'est mal passé, réessayez plus tard ...";	
		                header("Location: login.php?err=err");
		                exit;
					}			
				}

	}

	if (isset($_POST['log'])) {
		$email=$_POST['uemail'];
		$pass=$_POST['pass2'];

			$email = trim($email);
			$email = strip_tags($email);
			$email = htmlspecialchars($email);
			
			$pass = trim($pass);
			$pass = strip_tags($pass);
			$pass = htmlspecialchars($pass);

			$error = false;
			
			if(empty($email)){
				$error = true;
				$_SESSION['err_msg'] = "S'il vous plaît entrez votre adresse email.";
				redirect("login.php?err=email");
		  		
				
			} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
				$error = true;
				$_SESSION['err_msg'] = "Veuillez entrer une adresse email valide.";
				redirect("login.php?err=email");
		    	exit;
				
			}
			
			if(empty($pass)){
				$error = true;
				$_SESSION['err_msg'] = "S'il vous plait entrez votre mot de passe.";
				redirect("login.php?err=pass");
		    	exit;
			}

			if (!$error) {
				$hashed = hash('sha256', $pass);
				$sql = "SELECT * FROM `utilisateur` WHERE `email` = '".$email."' AND `PASSWORD` = '".$hashed."' ";
				$resu = mysqli_query($con, $sql);
				$row = mysqli_fetch_array($resu);
				$count = mysqli_num_rows($resu); 
				//$count = 1;
				if($count == 1) {
					$myid = $row['ID_UTILISATEUR'];
					$_SESSION['userid'] = $myid;
					$_SESSION['valid'] = true;
					header("Location: dashboard");
					exit;
				} else {
					$error = true;
					$_SESSION['err_msg'] = "Informations d'identification incorrectes, réessayez ...";
					redirect("login.php?err=err");
		    		exit;
				}
					
			}	
	}



?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CV-Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="Mouad Boualhdoud & Mouhamed Wadie El Mohtadi" name="author" />
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets2/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets2/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets2/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets2/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets2/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="assets2/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets2/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets2/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top lazy"  data-original="assets2/img/work.jpg"  style="background-image: url('assets2/img/work.jpg')"> 
<div class="container">
  <div class="row login-container animated fadeInUp">  
        <div class="col-md-7 col-md-offset-2 tiles white no-padding">
		 <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10"> 
          <h2 class="normal">Connectez-vous à CV-théque</h2>
          <p>Utilisez votre adresse e-mail pour vous connecter.<br></p>
          <p class="p-b-20">S'inscrire maintenant! pour le compte cv-théque, c'est gratuit et ça sera toujours ..</p>
		  <button type="button" class="btn btn-primary btn-cons" id="login_toggle">Connexion</button> or&nbsp;&nbsp;<button type="button" class="btn btn-info btn-cons" id="register_toggle"> Créer un compte</button>
        </div>
        <?php
        if (isset($_GET['err']) && isset($_SESSION['err_msg'])) {
        	echo '
        	<div class="alert alert-error m-l-40 m-r-40">
                  <button class="close" data-dismiss="alert"></button>
                  '.$_SESSION['err_msg'].'
                </div>
        	';
        }
        if (isset($_SESSION['suc_msg'])) {
        	echo '
        	<div class="alert alert-success m-l-40 m-r-40">
                  <button class="close" data-dismiss="alert"></button>
                  '.$_SESSION['suc_msg'].'
                </div>
        	';
        	unset($_SESSION['suc_msg']);
        }
        ?>
		<div class="tiles grey p-t-20 p-b-20 text-black">
			<form action="" method="post" id="frm_login" class="animated fadeIn">    
                <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                   <div class="col-md-6 col-sm-6 ">
                        <input name="uemail" id="login_username" type="email"  class="form-control" placeholder="Email">
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <input name="pass2" id="login_pass" type="password"  class="form-control" placeholder="Password">
                      </div>
                    </div>
				<div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
				  
				  <div class="control-group  col-md-2">
						<button  type="submit" href="#" name="log" class="btn btn-primary btn-cons">Login</button>
				  </div>
				</div>

			</form>
			<form action="" method="post" id="frm_register" class="animated fadeIn" style="display:none">
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-6 col-sm-6">
                        <input name="name" id="reg_username" type="text"  class="form-control" placeholder="Nom">
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <input name="prenom" id="reg_pass" type="text"  class="form-control" placeholder="Prenom">
                      </div>
                    </div>	
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-12">
                        <input name="email" id="reg_mail" type="email"  class="form-control" placeholder="Addresse E-mail">
                      </div>
                    </div>	
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-6 col-sm-6">
                        <input name="pass" id="reg_first_Name" type="password"  class="form-control" placeholder="Mote de Pass">
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <input name="copass" id="reg_first_Name" type="password"  class="form-control" placeholder="confirme Mote de Pass">
                      </div>
                    </div>	
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10 right">
                    	<div class="control-group  col-md-2">
							<button type="submit" href="#" name="sing" class="btn btn-primary btn-cons">Se conneter</button>
					    </div>	
                    </div>
			</form>
		</div>   
      </div>   
  </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets2/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets2/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets2/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets2/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets2/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<script src="assets2/js/login_v2.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>

</html>