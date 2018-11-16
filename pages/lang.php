<div id="container">
<?php
if (isset($_POST['addcomp'])) {
	$comp = checkin($_POST['comp']);
    $nv=checkin($_POST['nv']);

	if (empty($comp) or empty($nv)) {
		$error = true;
		$_SESSION['err_msg'] = "S'il vous plaît entrez les informations.";
		header("Location: dashboard?page=lang&err=empty");
	}else{
		$instel = mysqli_query($con,"INSERT into `utilisateur_langue`( `ID_UTILISATEUR`, `LANGUE`,`LANGUE_NIVEAU`) VALUES ('".$id."','".$comp."','".$nv."')");
        header("Location: dashboard?page=lang");
        exit;

	}
}
if(isset($_GET['action']) && isset($_GET['lan']) && $_GET['action'] == 'delete'){
		$lan = $_GET['lan'];
		$deltel = mysqli_query($con,"DELETE FROM `utilisateur_langue` WHERE ID_UTILISATEUR='".$id."' AND LANGUE= '".$lan."'");						
		header("Location: dashboard?page=lang");
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
                  <h4>Ajouter <span class="semi-bold"> Langue </span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>

				<form action="" method="post">
                   <div class="form-group">
                        <label class="form-label">Nom de Langue</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
                            <select id="source" name="comp" style="width:100%" class="form-control">
                            <?php
                            $alllang = mysqli_query($con,"SELECT * from langue");
                            while ($getlang = mysqli_fetch_assoc($alllang)) {
                                echo '
                                
                                    <option value="'.$getlang['LANGUE'].'">'.$getlang['LANGUE'].'</option>
                                     
                                ';
                            }
                            ?>
                             </select>                 
						</div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">NIVEAU</label>
                        <div class="input-with-icon  right">                                       
                            <i class=""></i>
                            <input type="number" name="nv" id="form1Name" class="form-control" min="1" max="100">                                 
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
                                            $selecttele = mysqli_query($con,"select * from utilisateur_langue where ID_UTILISATEUR='".$id."'");
                                            $i=1;
                                            if (mysqli_num_rows($selecttele) != 0) {
                                                while ($gettele = mysqli_fetch_assoc($selecttele)) {
                                                    echo '
                                                        <tr>
                                                            <td>'.$i.'</td>
                                                            <td>'.$gettele['LANGUE'].'</td> 
                                                            <td>'.$gettele['LANGUE_NIVEAU'].'%</td> 
                                                            <td><a href="dashboard?page=lang&action=delete&lan='.$gettele['LANGUE'].'" class="btn btn-danger btn-cons"> Supprimer</a></td>
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