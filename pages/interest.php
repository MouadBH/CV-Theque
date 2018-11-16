<div id="container">
<?php
if (isset($_POST['addcomp'])) {
	$comp = checkin($_POST['comp']);

	if (empty($comp)) {
		$error = true;
		$_SESSION['err_msg'] = "S'il vous plaît entrez les informations.";
		header("Location: dashboard?page=interest&err=empty");
        exit;
	}else{
		$instel = mysqli_query($con,"INSERT into `interest`( `ID_UTILISATEUR`, `LIBELLE`) VALUES ('".$id."','".$comp."')");
		header("Location: dashboard?page=interest");
        exit;
	}
}
if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){
		$compid = $_GET['id'];
		$deltel = mysqli_query($con,"DELETE FROM `interest` WHERE ID_INTEREST='".$compid."'");						
		header("Location: dashboard?page=interest");
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
                  <h4>Ajouter <span class="semi-bold"> Interest </span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>

				<form action="" method="post">
                   <div class="form-group">
                        <label class="form-label">Nom de Interest</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="comp" id="form1Name" class="form-control">                                 
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

                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php
                                            $selecttele = mysqli_query($con,"select * from interest where ID_UTILISATEUR='".$id."'");
                                            $i=1;
                                            if (mysqli_num_rows($selecttele) != 0) {
                                                while ($gettele = mysqli_fetch_assoc($selecttele)) {
                                                    echo '
                                                        <tr>
                                                            <td>'.$i.'</td>
                                                            <td>'.$gettele['LIBELLE'].'</td>    
                                                            <td><a href="dashboard?page=interest&action=delete&id='.$gettele['ID_INTEREST'].'" class="btn btn-danger btn-cons"> Supprimer</a></td>
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