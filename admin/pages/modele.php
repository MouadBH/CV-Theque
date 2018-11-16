<div id="container">
	<?php
    $getcv = mysqli_query($con,"SELECT * FROM `cv_modele`");

    if (isset($_GET['cv']) && isset($_GET['action']) && $_GET['action']='delete' ) {
      $cv = $_GET['cv'];
      $cv = mysqli_real_escape_string($con,$cv);
        $deltel_cvu = mysqli_query($con,"DELETE FROM utilisateur_cv_modele WHERE `ID_MODELE`='".$cv."'  ");	
        $deltel = mysqli_query($con,"DELETE FROM cv_modele WHERE `ID_MODELE`='".$cv."'  ");						
		header("Location: index.php?page=modele");
		$_SESSION['err_suc'] = "Modele supprimer.";
        exit;

    }

    while($cv = mysqli_fetch_assoc($getcv)){
        
	?>
    <?php
        if(isset($_SESSION['err_suc'])){
            echo '
                    <div class="alert alert-success m-l-40 m-r-40">
                      <button class="close" data-dismiss="alert"></button>
                      '.$_SESSION['err_suc'].'
                    </div>
                ';
        	       unset($_SESSION['err_suc']);
            }
                ?>
      <div class="col-md-4 col-sm-4 " style="margin-bottom: 10px;">
                <div class="tiles red weather-widget" style="background: linear-gradient(to bottom right,#252525,#25252554), url(../<?php echo $cv['img']; ?>);    background-size: cover;">
                  <div class="tiles-body">
                    
                    <div class="tiles-title"><a href="#"></a>  </div>
                    <div class="heading">
                      <div class="pull-left"> <?php echo $cv['MODELE']; ?> </div>
                    
                      <div class="clearfix"></div>
                    </div>
                    <div class="big-icon">
                      <canvas id="partly-cloudy-day" width="120" height="120"></canvas>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="tile-footer">
                    <div class="pull-left">
                      <a type="button" href="index.php?page=modele&action=delete&cv=<?php echo $cv['ID_MODELE']; ?>" class="btn btn-danger btn-cons">Supprimer</a>
                    </div>
                    <div class="pull-right">
                      <button class="btn btn-primary btn-cons" data-toggle="modal" data-target="#myModal<?php echo $cv['ID_MODELE']; ?>">Edit</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            
    <!-- Modal -->
    <?php
    if (isset($_POST['addmodel'])) {
      $id = $_POST['id'];
      $nom = $_POST['nom'];
      $img = $_POST['img'];
      $dir = $_POST['dir'];
      if(empty($nom) or empty($img) or empty($dir)){
      $_SESSION['err_sucm'] = "S'il vous plaît entrez votre donne.";
          header("Location: index.php?page=addmodele");
          exit;
      }else{
          $addmodele = mysqli_query($con,"UPDATE `cv_modele` SET `MODELE`='".$nom."',`img`='".$img."',`dir`='".$dir."' WHERE `ID_MODELE`='".$id."'");
          if($addmodele){
              $_SESSION['err_sucm'] = "Modele modifier.";
              header("Location: index.php?page=modele");
              exit;
          }
      }
    }
    ?>
                  <div class="modal fade" id="myModal<?php echo $cv['ID_MODELE']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                         
                         <form action="" method="post" >
                          <div class="form-group">
                            <label class="form-label">Nome de Modele</label>
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input type="text" name="nom" value="<?php echo $cv['MODELE']; ?>" class="form-control">
                                <input type="hidden" value="<?php echo $cv['ID_MODELE']; ?>" name="id" class="form-control">                                 
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="form-label">Image de Modele</label>
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input type="text" name="img" value="<?php echo $cv['img']; ?>" class="form-control">
                            </div>
                          </div>
                        <div class="form-group">
                            <label class="form-label">Directory de Modele</label>
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input type="text" name="dir" value="<?php echo $cv['dir']; ?>" class="form-control">
                            </div>
                          </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" name="addmodel" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                            
                        </div>
                        
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
    
  <?php } ?>
</div>