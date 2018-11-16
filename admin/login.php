<?php 
require("../inc/config.php");

if(isset($_POST['adminlog'])){
    $email = checkin($_POST['txtusername']);
    $pass = checkin($_POST['txtpassword']);
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
				$sql = "SELECT * FROM `admin` WHERE `E_ADMIN` = '".$email."' AND `P_ADMIN` = '".$hashed."' ";
				$resu = mysqli_query($con, $sql);
				$row = mysqli_fetch_array($resu);
				$count = mysqli_num_rows($resu); 
				//$count = 1;
				if($count == 1) {
					$myid = $row['ID_ADMIN'];
					$_SESSION['admin'] = $myid;
					$_SESSION['valid'] = true;
					header("Location: index.php");
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
<title>CV-Théque - Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="../assets2/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../assets2/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets2/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets2/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../assets2/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="../assets2/css/style.css" rel="stylesheet" type="text/css"/>
<link href="../assets2/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="../assets2/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top">
<div class="container">
  <div class="row login-container column-seperation">  
        <div class="col-md-5 "> <br>
		 <form id="login-form" class="login-form" action="" method="post">
		 <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">Username</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="txtusername" id="txtusername" class="form-control">                                 
				</div>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Password</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="txtpassword" id="txtpassword" class="form-control">                                 
				</div>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <button class="btn btn-primary btn-cons pull-right" name="adminlog" type="submit">Login</button>
            </div>
          </div>
		  </form>
        </div>
        <?php
        if (isset($_GET['err']) && isset($_SESSION['err_msg'])) {
        	echo '
            <div class="col-md-5 col-md-offset-1">
                <div class="alert alert-error m-l-40 m-r-40">
                  <button class="close" data-dismiss="alert"></button>
                  '.$_SESSION['err_msg'].'
                </div>
            </div>
        	
        	';
        }
        ?>
    
  </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="../assets2/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../assets2/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets2/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="../assets2/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../assets2/js/login.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>
</html>