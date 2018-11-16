<div id="container">
<?php
if (isset($_POST['EditProf'])) {
	$fname = checkin($_POST['form1Name']);
	$lname = checkin($_POST['form1lName']);
	$email = checkin($_POST['form1Email']);
	$address = checkin($_POST['form1Address']);
	$city = checkin($_POST['form1City']);
	$country = checkin($_POST['form1Pays']);
	$desc = checkin($_POST['form1desc']);

	$error = false;
	if (empty($fname) or empty($lname) or empty($email) or empty($address) or empty($city) or empty($country) or empty($desc)) {
		$error = true;
		$_SESSION['err_msg'] = "S'il vous plaît entrez les informations.";
		header("Location: dashboard?page=profile&err=empty");
		exit;
	}else{

		if(!preg_match("/^[a-zA-Z ]+$/",$fname) or !preg_match("/^[a-zA-Z ]+$/",$lname)){
			$error = true;
			$_SESSION['err_msg'] = 'Nom incorrect.';
			header("Location: dashboard?page=profile&err=name");
			exit;
		}

		if ( !filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error = true;
			$_SESSION['err_msg'] = "Veuillez entrer une adresse email valide.";
		    header("Location: dashboard?page=profile&err=email");
		    exit;
		}

		if( !$error ) {
			$resulta = mysqli_query($con,"select nom, prenom, email, rue, paye, ville FROM utilisateur inner join adresse on utilisateur.id_utilisateur=adresse.id_utilisateur where utilisateur.ID_UTILISATEUR='".$id."'");
			if (mysqli_num_rows($resulta) == 1) {
				$upadre = mysqli_query($con, "UPDATE  adresse SET 
						`PAYE` = '".$country."',
						`VILLE` = '".$city."',
						`RUE`= '".$address."'
						where
						adresse.id_utilisateur='".$id."'
						");
				$upuse = mysqli_query($con, "UPDATE  utilisateur SET 
						`NOM`='".$fname."',
						`PRENOM`='".$lname."',
						`EMAIL`='".$email."'
						where
						id_utilisateur='".$id."'
						");
				$updesc = mysqli_query($con,"UPDATE Description set Description='".$desc."' where id_description=(select id_description from utilisateur where id_utilisateur='".$id."')");

				if ($upadre && $upuse && $updesc){
						$error = false;
						$_SESSION['suc_msg'] = "Mise à jour réussie.";
						header("Location: dashboard?page=profile");
						exit();
					} else {
						$error = true;
						$_SESSION['err_msg'] = "Quelque chose s'est mal passé, réessayez plus tard ...";	
		                header("Location: dashboard?page=profile&err=err1");
		                exit;
					}

				
			}else{
				$adddes = mysqli_query($con,"INSERT INTO `adresse`(`ID_UTILISATEUR`, `PAYE`, `VILLE`, `RUE`) VALUES ('".$id."','".$country."','".$city."','".$address."')");
				
				$lastid = mysqli_query($con,"select id_description from description order by id_description limit 1");
				$lastid = mysqli_fetch_assoc($lastid);
				$indesc = mysqli_query($con,"INSERT into Description(`ID_DESCRIPTION`,`DESCRIPTION`) VALUES ('".$lastid++."','".$desc."')");
				$upuse = mysqli_query($con, "UPDATE  utilisateur SET 
						`NOM` = '".$fname."',
						`PRENOM`='".$lname."',
						`EMAIL`='".$email."'
						`ID_DESCRIPTION`='".$lastid."'
						where
						id_utilisateur='".$id."'
						");
				$indesc = mysqli_query($con,"INSERT into Description(`DESCRIPTION`) VALUES ('".$desc."')");

				if ($adddes and $upuse){
						$error = false;
						$_SESSION['suc_msg'] = "Mise à jour réussie.";
						header("Location: dashboard?page=profile");
						exit();
					} else {
						$error = true;
						$_SESSION['err_msg'] = "Quelque chose s'est mal passé, réessayez plus tard ...";	
		                header("Location: dashboard?page=profile&&err=err");
		                exit;
					}

			}
								
				}


	}

}



if (isset($_POST['chpass'])) {
	$oldpass=checkin($_POST['oldpass']);
	$newpass=checkin($_POST['newpass']);
	$confpass=checkin($_POST['confpass']);
	if(empty($oldpass) or empty($newpass) or empty($confpass) ){
		$error = true;
		$_SESSION['err_msg'] = "S'il vous plait entrez votre mot de passe.";
		header("Location: dashboard?page=profile&err=empty");
		exit;
	}elseif(strlen($newpass) < 6) {
		$error = true;
		$_SESSION['err_msg'] = "Le mot de passe doit comporter au moins 6 caractères.";
		header("Location: login.php?err=pass");
		exit;
	}else{
		if (hash('sha256', $oldpass) != $pass or $confpass!=$newpass) {
			$error = true;
			$_SESSION['err_msg'] = 'Mot de passe ne correspond pas.';
			header("Location: dashboard?page=profile&err=pass");
			exit;
		}
		else{
			$hashed = hash('sha256', $newpass);
			$query=mysqli_query($con,"UPDATE utilisateur set `password`='".$hashed."' where id_utilisateur='".$id."' " );
			$_SESSION['suc_msg'] = "Mot de passe mis à jour.";
		}


	}



}


if (isset($_POST['addtele'])) {
	$tele = checkin($_POST['form1tele']);

	if (empty($tele)) {
		$error = true;
		$_SESSION['err_msg'] = 'Veuillez entrer votre nemuro.';
		header("Location: dashboard?page=profile&err=tele");
		exit;
	}else{
		$instel = mysqli_query($con,"INSERT into TELEPHONE (`ID_UTILISATEUR`, `TELEPHONE`) VALUES ('".$id."','".$tele."') ");
		$_SESSION['suc_msg'] = "Telephone ajouté.";

	}
}

if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){
		
		$telid = $_GET['id'];
		$deltel = mysqli_query($con,"DELETE FROM `telephone` WHERE ID_TELEPHONE='".$telid."'");						
		header("Location: dashboard?page=profile");
		$_SESSION['suc_msg'] = "Telephone supprimé.";
		exit;						
	}

?>
<?php
        if (isset($_GET['err'])) {
        	echo '
        	<div class="alert alert-error col-md-10 m-l-40 m-r-40">
                  <button class="close" data-dismiss="alert"></button>
                  '.$_SESSION['err_msg'].'
                </div>
        	';
        }
        if (isset($_SESSION['suc_msg'])) {
        	echo '
        	<div class="alert alert-success col-md-10 m-l-40 m-r-40">
                  <button class="close" data-dismiss="alert"></button>
                  '.$_SESSION['suc_msg'].'
                </div>
        	';
        	unset($_SESSION['suc_msg']);
        }
        ?>
	<div class="col-md-10">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Basic <span class="semi-bold">information </span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>
				<form action="" method="post"  >
                      <div class="form-group">
                        <label class="form-label">First Name</label>
                        <span class="help">e.g. "Jonh Smith"</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="form1Name" id="form1Name" value="<?php echo $nom; ?>" class="form-control">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <span class="help">e.g. "Jonh Smith"</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="form1lName" id="form1Name" value="<?php echo $prenom; ?>" class="form-control">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Your email</label>
                        <span class="help">e.g. "john@examp.com"</span>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="form1Email" id="form1Email" value="<?php echo $email; ?>" class="form-control">                                 
						</div>
                      </div>
                     
                      <div class="form-group">
                        <label class="form-label">Adress</label>
							<div class="row form-row">
		                      <div class="col-md-12">
		                      	<div class="input-with-icon  right">
		                      	<i class=""></i>
		                        <input name="form1Address" id="form1Address" type="text" value="<?php echo $rue; ?>"  class="form-control" placeholder="Address">
		                      </div>
		                    </div>
		                    <div class="row form-row">
		                    	<div class="col-md-12">
		                      <div class="col-md-6">
		                      	<div class="input-with-icon  right">
		                      	<i class=""></i>
		                        <input name="form1City" id="form1City" type="text" value="<?php echo $ville; ?>"  class="form-control" placeholder="City">
		                    	</div>
		                      </div>
		                      <div class="col-md-6">
		                      	<div class="input-with-icon  right">
		                      	<i class=""></i>
		                        <input name="form1Pays" id="form1State" type="text" value="<?php echo $pay; ?>"  class="form-control" placeholder="Contry">
		                    	</div>
		                      </div>
		                  </div>
		                    </div>                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Description</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<?php
							$getdesc = mysqli_query($con,"SELECT * FROM `description` WHERE ID_DESCRIPTION='".$desc."'");
							$text = mysqli_fetch_assoc($getdesc);
							?>
							<textarea rows="5" name="form1desc" class="form-control"><?php echo $text['DESCRIPTION']; ?></textarea>                                 
						</div>
                      </div>                
				  <div class="form-actions">  
					<div class="pull-right">
					  <button type="submit" name="EditProf" href="#" class="btn btn-danger "> Save</button>
					  
					</div>
					</div>
				</form>
                </div>
              </div>
    </div>

    <div class="col-md-10">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Changer <span class="semi-bold"> Photo </span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>
                	
                	<div class="col-lg-12 cropHeaderWrapper" style="padding: 10px;background: rgba(0,0,0,0.03);border: 1px solid rgba(0,0,0,0.03);">
						<div id="croppic"></div>
						<div class="pull-right">
							<span class="btn btn-danger" id="cropContainerHeaderButton">Select Photo</span>
						</div>
						<div class="pull-left">
							<span class="btn btn-danger" onclick="getimg()" id="uploadimg">Upload Photo</span>
						</div>
					</div><!-- /col-lg-6 -->
                </div>
              </div>
    </div>

 <script type="text/javascript">
 function getimg(){
 	//var imgdiv = document.getElementsById('uped');
 	var img = document.querySelector('#croppic > img').src;

	        $.post("inc/img_into_db.php",
	        {
	          img: img,
	          id: <?php echo $id; ?>
	        },
	        function(data,status){
	            alert("Data: " + data + "\nStatus: " + status);
	        });

 }
 </script>

    <div class="col-md-10">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Ajouter <span class="semi-bold"> Telephone </span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>
				<form action="" method="post" >
                   <div class="form-group">
                        <label class="form-label">Telephone</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="tel" name="form1tele" class="form-control">                                 
						</div>
                      </div>
				  <div class="form-actions">  
					<div class="pull-right">
					  <button type="submit" name="addtele" class="btn btn-danger btn-cons"><i class="icon-ok"></i> Save</button>
					</div>
					</div>
				</form>
                </div>
                <div class="grid-body no-border">
                	<table class="table table-hover no-more-tables">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Telephone</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php
                                            $selecttele = mysqli_query($con,"select * from TELEPHONE where ID_UTILISATEUR='".$id."'");
                                            $i=1;
                                            while ($gettele = mysqli_fetch_assoc($selecttele)) {
                                            	echo '
													<tr>
                                                        <td>'.$i.'</td>
                                                        <td>'.$gettele['TELEPHONE'].'</td>
                                                        <td><a href="dashboard?page=profile&action=delete&id='.$gettele['ID_TELEPHONE'].'" class="btn btn-danger btn-cons"> Supprimer</a></td>
                                                    </tr>
                                            	';                                  
                                            	$i++;   
                                            }
                                            ?>
                                                    
                                                </tbody>
                                            </table>
                </div>
              </div>
    </div>

    <div class="col-md-10">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Changer <span class="semi-bold"> mot de passe </span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>
				<form method="post" action="" >
                   <div class="form-group">
                        <label class="form-label">Ancien mot de passe</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="password" name="oldpass" id="form1Name" class="form-control">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Nouveau mot de passe</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="password" name="newpass" id="form2Name" class="form-control">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Confirmez le mot de passe</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="Password" name="confpass" id="form1Email" class="form-control">                                 
						</div>
                      </div> 
                                     
				  <div class="form-actions">  
					<div class="pull-right">
					  <button name="chpass" type="submit" class="btn btn-danger btn-cons"><i class="icon-ok"></i> Save</button>
					</div>
					</div>
				</form>
                </div>
              </div>
    </div>


</div>