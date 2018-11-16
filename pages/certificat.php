 <?php 
      if (isset($_POST['added'])) {
      $lib = checkin($_POST['lib']);
      $aut = checkin($_POST['aut']);
      $dd= checkin($_POST['dd']);
      $desc = checkin($_POST['desc']);

        if ( empty($lib) or empty($aut) or empty($dd) ) {
        $error = true;
        $_SESSION['err_msg'] = "S'il vous plaît entrez les informations.";
        header("Location: dashboard?page=certificat&err=empty");
        exit;
        }else{
          if (empty($desc)) {
            $id_desc=1;
          }else{ 
            $query=mysqli_query($con,"INSERT INTO `description`(`DESCRIPTION`)VALUES ('".$desc."') ");
            $id_desc1=mysqli_query($con,"SELECT `ID_DESCRIPTION`from `description` order by `ID_DESCRIPTION` DESC limit 1 ");
              $id_desc=mysqli_fetch_assoc($id_desc1);
          }

          $quer=mysqli_query($con,"INSERT INTO `generale_date`(`DATE`) VALUES ('".$dd."')");
          $id_db1=mysqli_query($con,"SELECT `ID_DATE` FROM `generale_date` order by `ID_DATE` desc limit 1 ");
          $id_db=mysqli_fetch_assoc($id_db1);

          $query=mysqli_query($con,"insert INTO `certificat`( `ID_UTILISATEUR`, `ID_DATE`, `ID_DESCRIPTION`,`LIBELLE`, `AUTEUR`) VALUES ('".$id."','".$id_db['ID_DATE']."','".$id_desc['ID_DESCRIPTION']."','".$lib."','".$aut."')");


        }

      }

if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){
    $compid = $_GET['id'];
    $deltel = mysqli_query($con,"DELETE FROM `certificat` WHERE ID_CERTIFICAT='".$compid."'");            
    header("Location: dashboard?page=certificat");
    exit;           
  }

  ?>

  <?php
        if (isset($_GET['err'])) {
          echo '
          <div class="alert alert-error m-l-40 m-r-40">
                  <button class="close" data-dismiss="alert"></button>
                  '.$_SESSION['err_msg'].'
                </div>
          ';
        }
        ?>
 <div class="col-md-10">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Ajouter <span class="semi-bold"> Certificat </span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>

        <form action="" method="post">
                   <div class="form-group">
                        <label class="form-label">LIBELLE</label>
                        <div class="input-with-icon  right">                                       
                          <i class=""></i>
                          <input type="text" name="lib" id="form1Name" class="form-control">                                 
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="form-label">AUTEUR</label>
                        <div class="input-with-icon  right">                                       
                          <i class=""></i>
                          <input type="text" name="aut" id="form1Name" class="form-control">                                 
                        </div>
                      </div>
                     <div class="form-group">
                        
                        <div class="row form-row">
                          <div class="col-md-12">
                          <div class="col-md-6">
                            <div class="input-with-icon  right">
                            <i class=""></i>
                            <label class="form-label">DATE D'OPTENTION</label>
                            <input name="dd" id="form1City" type="date" placeholder=""  class="form-control" >
                          </div>
                          </div>
                      </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Description</label>
                        <div class="input-with-icon  right">                                       
                          <i class=""></i>   
                          <textarea rows="5" name="desc" class="form-control"></textarea>                             
                        </div>
                      </div>

          <div class="form-actions">  
          <div class="pull-right">
            <button type="submit" name="added" class="btn btn-danger btn-cons"> Save</button>
          </div>
          </div>
        </form>

                </div>
                <div class="grid-body no-border">
                  <table class="table table-hover no-more-tables">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>LIBELLE</th>
                                                        <th>AUTEUR</th>
                                                        <th>DATE D'OPTENTION</th>
                                                        <th>DESCRIPTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php
$INST = mysqli_query($con,"select * from certificat where ID_UTILISATEUR='".$id."'");

$i=1;

while ($inst1 = mysqli_fetch_assoc($INST)) {

$DATE_DEBUT=mysqli_query($con,"select * from generale_date where ID_DATE=(select ID_DATE from certificat where ID_UTILISATEUR='".$id."' and ID_CERTIFICAT='".$inst1['ID_CERTIFICAT']."') ");
$db = mysqli_fetch_assoc($DATE_DEBUT);

$DESC=mysqli_query($con,"select * from description where id_description=(select ID_DESCRIPTION from certificat where ID_UTILISATEUR='".$id."' and ID_CERTIFICAT='".$inst1['ID_CERTIFICAT']."') ");
$des1 = mysqli_fetch_assoc($DESC);

echo '
<tr>
<td>'.$i.'</td>
<td>'.$inst1['LIBELLE'].'</td>
<td>'.$inst1['AUTEUR'].'</td>
<td>'.$db['DATE'].'</td>
<td>'.$des1['DESCRIPTION'].'</td>
<td><a href="dashboard?page=certificat&action=delete&id='.$inst1['ID_CERTIFICAT'].'" class="btn btn-danger btn-cons"> Supprimer</a></td>
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
</div>