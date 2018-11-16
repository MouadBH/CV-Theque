
<?php
  $getucv = mysqli_query($con,"SELECT SUM(`MODEL_VIEW`) as temp FROM `utilisateur_cv_modele`");
  $temp = mysqli_fetch_assoc($getucv);

	?>
<div class="col-md-12">
            <div class="col-md-12 m-b-10 m-t-10">  
          <!-- BEGIN SALES WIDGET WITH FLOT CHART 2-->      
          <div class="tiles white add-margin">
            <div class="p-t-20 p-l-20 p-r-20 p-b-20">
            <div class="row xs-p-b-20">
            <div class="col-md-4 col-sm-4">

              <h4 class="text-black semi-bold">Total des visites</h4>
              <h3 class="text-error semi-bold"><?php echo $temp['temp']; ?></h3>
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
</div>