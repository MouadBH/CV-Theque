<div id="container">
	<?php
    $getcv = mysqli_query($con,"SELECT * FROM `cv_modele`");

    if (isset($_GET['cv'])) {
      $cv = checkin($_GET['cv']);
      $cv = mysqli_real_escape_string($con,$cv);
      $selectcv = mysqli_query($con,"SELECT * FROM `utilisateur_cv_modele` where ID_UTILISATEUR='".$id."'");
      $count = mysqli_num_rows($selectcv);
      if ($count == 1) {
        $upcv = mysqli_query($con,"UPDATE `utilisateur_cv_modele` SET `ID_MODELE`='".$cv."' WHERE `ID_UTILISATEUR`='".$id."'");
        $_SESSION['suc_msg'] = "done.";

        header("Location: dashboard?page=modele");
          exit;
      }else{
        $creecv = mysqli_query($con,"INSERT INTO `utilisateur_cv_modele`(`ID_MODELE`, `ID_UTILISATEUR`) VALUES ('".$cv."','".$id."')");
        if ($creecv) {
          header("Location: dashboard?page=modele");
          exit;
        }
      }

    }


                if(isset($_SESSION['suc_msg'])){
                    echo '
                        <div class="alert alert-success m-l-40 m-r-40">
                          <button class="close" data-dismiss="alert"></button>
                          '.$_SESSION['suc_msg'].'
                        </div>
                    ';
                 unset($_SESSION['suc_msg']);
                }
              
    while($cv = mysqli_fetch_assoc($getcv)){
	?>

      <div class="col-md-4 col-sm-4 " style="margin-bottom: 10px;">
                <div class="tiles red weather-widget" style="background: linear-gradient(to bottom right,#252525,#25252554), url(<?php echo $cv['img']; ?>);    background-size: cover;">
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
                      <a type="button" href="dashboard?page=modele&cv=<?php echo $cv['ID_MODELE']; ?>" class="btn btn-primary btn-cons">Choise</a>
                    </div>
                 <!--   <div class="pull-right">
                      <a type="button" href="<?php echo $cv['dir']; ?>" class="btn btn-primary btn-cons">Revue</a>
                    </div>-->
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
  <?php } ?>
</div>