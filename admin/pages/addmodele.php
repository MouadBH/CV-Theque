<?php
if(isset($_POST['addmodel'])){
    $nom = $_POST['nom'];
    $img = $_POST['img'];
    $dir = $_POST['dir'];
    if(empty($nom) or empty($img) or empty($dir)){
		$_SESSION['err_sucm'] = "S'il vous plaît entrez votre donne.";
        header("Location: index.php?page=addmodele");
        exit;
    }else{
        $addmodele = mysqli_query($con,"INSERT INTO `cv_modele`(`MODELE`, `img`, `dir`) VALUES ('".$nom."','".$img."','".$dir."')");
        if($addmodele){
            $_SESSION['err_sucm'] = "Modele ajouter.";
            header("Location: index.php?page=addmodele");
            exit;
        }
    }
}
?>
<?php
                if(isset($_SESSION['err_sucm'])){
                    echo '
                        <div class="alert alert-success m-l-40 m-r-40">
                          <button class="close" data-dismiss="alert"></button>
                          '.$_SESSION['err_sucm'].'
                        </div>
                    ';
        	       unset($_SESSION['err_sucm']);
                }
?>
<div class="col-md-10">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Ajoute <span class="semi-bold">Modele </span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>
				<form action="" method="post" >
                      <div class="form-group">
                        <label class="form-label">Nome de Modele</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="nom" class="form-control">                                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Image de Modele</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="img" class="form-control">
						</div>
                      </div>
                    <div class="form-group">
                        <label class="form-label">Directory de Modele</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="dir" class="form-control">
						</div>
                      </div>
               
				  <div class="form-actions">  
					<div class="pull-right">
					  <button type="submit" name="addmodel" class="btn btn-danger "> Save</button>
					  
					</div>
					</div>
				</form>
                </div>
              </div>
    </div>