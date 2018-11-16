<div id="container">
	<?php
  $getucv = mysqli_query($con,"SELECT * FROM `utilisateur_cv_modele`,`cv_modele` WHERE `ID_UTILISATEUR`='".$id."' AND  utilisateur_cv_modele.ID_MODELE=cv_modele.ID_MODELE");
  $temp = mysqli_fetch_assoc($getucv);

	?>
	<div class="col-md-4 col-sm-4 ">
                <div class="tiles red weather-widget" style="background: linear-gradient(to bottom right,#25252594,#2525253b), url(<?php echo $temp['img']; ?>);    background-size: cover;">
                  <div class="tiles-body">
                    
                    <div class="tiles-title"><a href="#"></a>  </div>
                    <div class="heading">
                      <div class="pull-left"> <?php echo $temp['MODELE']; ?> </div>
                     
                      <div class="clearfix"></div>
                    </div>
                    <div class="big-icon">
                      <a href="user/<?php echo $id; ?>" style="color: #fff;">
                        <i class="fa fa-file-text-o" style="font-size: 86px;margin: 25px;"></i>
                      </a>
                      
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="tile-footer">
                    <div class="pull-left">
                      
                      <a type="button" href="dashboard?page=modele" class="btn btn-primary btn-cons">changer</a>
                  	</div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
 
    <div class="col-md-8 col-sm-4 m-t-15">
      <div class="col-md-12 m-b-10 m-t-10">  
          <!-- BEGIN SALES WIDGET WITH FLOT CHART 2-->      
          <div class="tiles white add-margin">
            <div class="p-t-20 p-l-20 p-r-20 p-b-20">
            <div class="row xs-p-b-20">
            <div class="col-md-4 col-sm-4">

              <h4 class="text-black semi-bold">Total des visites</h4>
              <h3 class="text-error semi-bold"><?php echo $temp['MODEL_VIEW']; ?></h3>
            </div>
            <div class="col-md-3 col-sm-3" style="float: right;">
            <div class="m-t-20">
              <i class="fa fa-eye" style="font-size: 70px;text-align: center;line-height: 40px;"></i>
            </div>
            </div>
            
            </div>
            </div>
            
          </div>
           <!-- END SALES WIDGET WITH FLOT CHART -->
      </div>
      <div class="col-md-12 m-b-10 m-t-10">  
          <!-- BEGIN SALES WIDGET WITH FLOT CHART 2-->      
          <div class="tiles white add-margin">
            <div class="p-t-20 p-l-20 p-r-20 p-b-20">
            <div class="row xs-p-b-20">
            <div class="col-md-6 col-sm-4">

              <h4 class="text-black semi-bold"> Partagez votre CV</h4>
              <div>
                <input class="form-control" type="text" value="http://localhost/proj/cv/user/<?php echo $id ?>" style="width: 80%;float: left;" readonly>
                <a href="http://localhost/proj/cv/user/<?php echo $id ?>" class="btn active btn-primary dropdown-toggle tip" id="my-task-list"  target="blank" data-toggle="tooltip" title="REVUE"  data-placement="right"><i class="fa fa-location-arrow"></i></a>
              </div>
            </div>
            <div class="col-md-3 col-sm-3" style="float: right;">
            <div class="m-t-20">
              <i class="fa fa-share-square" style="font-size: 70px;text-align: center;line-height: 40px;"></i>
            </div>
            </div>
            
            </div>
            </div>
            
          </div>
           <!-- END SALES WIDGET WITH FLOT CHART -->
      </div>
    </div>
</div>