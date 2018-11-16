<div id="container">
<?php
if (isset($_POST['addcomp'])) {
	$comp = checkin($_POST['comp']);
	$nv = checkin($_POST['val']);

	if (empty($comp) or empty($nv)) {
		$error = true;
		$_SESSION['err_msg'] = "S'il vous plaît entrez les informations.";
		header("Location: dashboard?page=competencie&err=empty");
		exit;
	}else{
		$instel = mysqli_query($con,"INSERT into `competence`( `ID_UTILISATEUR`, `LIBELLE`, `NIVEAU`) VALUES ('".$id."','".$comp."','".$nv."') ");
		header("Location: dashboard?page=competencie");
        exit;

	}
}
if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){
		$compid = $_GET['id'];
		$deltel = mysqli_query($con,"DELETE FROM `competence` WHERE ID_COMPETENCE='".$compid."'");						
		header("Location: dashboard?page=competencie");
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
                  <h4>Ajouter <span class="semi-bold"> Competence </span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>

				<form action="" method="post">
                   <div class="form-group">
                        <label class="form-label">Nom de Competence</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="comp" id="form1Name" class="form-control">                                 
						</div>
                      </div>
                     <div class="form-group">
                        <label class="form-label">Niveau</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="number" name="val" id="form1Name" class="form-control" min="1" max="100">                                 
						</div>
                      </div>
				  <div class="form-actions">  
					<div class="pull-right">
					  <button type="submit" name="addcomp" class="btn btn-danger btn-cons"> Save</button>
					</div>
					</div>
				</form>

                </div>
                <div class="grid-body no-border">
                	<table class="table table-hover no-more-tables">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Competence</th>
                                                        <th>Niveau</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php
                                            $selecttele = mysqli_query($con,"select * from competence where ID_UTILISATEUR='".$id."'");
                                            $i=1;
                                            if (mysqli_num_rows($selecttele) != 0) {
                                            	while ($gettele = mysqli_fetch_assoc($selecttele)) {
	                                            	echo '
														<tr>
	                                                        <td>'.$i.'</td>
	                                                        <td>'.$gettele['LIBELLE'].'</td>
	                                                        <td>'.$gettele['NIVEAU'].'%</td>
	                                                        <td><a href="dashboard?page=competencie&action=delete&id='.$gettele['ID_COMPETENCE'].'" class="btn btn-danger btn-cons"> Supprimer</a></td>
	                                                    </tr>
	                                            	';                                  
	                                            	$i++;   
	                                            }
                                            }else{
                                            	echo "<tr><td><center> Aucune Competence </center></td></tr>";
                                            }
                                            
                                            ?>
                                                    
                                                </tbody>
                                            </table>
                </div>
              </div>
    </div>
</div>