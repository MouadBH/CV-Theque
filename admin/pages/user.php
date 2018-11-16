<?php
$alluser = mysqli_query($con,"SELECT * FROM `utilisateur`");

if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){
		$compid = $_GET['id'];
		$deltel = mysqli_query($con,"DELETE FROM `utilisateur` WHERE `ID_UTILISATEUR`='".$compid."'");	
    $_SESSION['err_suc'] = "Utilisateur supprimer.";					
		header("Location: index.php?page=user");
		
        exit;	
	}
?>

     <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>Utilisateur <span class="semi-bold">Information</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
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
             <table class="table" id="example3" >
                <thead>
                  <tr>
                    <th>nom</th>
                    <th>photo</th>
                    <th>desctiption</th>
                    <th>email</th>
                    <th>telephone</th>
                    <th>Modele</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    while($getu = mysqli_fetch_assoc($alluser)){
                        $getphoto = mysqli_query($con,"SELECT * FROM `photo` WHERE `ID_UTILISATEUR`='".$getu['ID_UTILISATEUR']."'");
                        $img = mysqli_fetch_assoc($getphoto);
                        
                        $getdesc = mysqli_query($con,"SELECT * FROM `description` WHERE `ID_DESCRIPTION`='".$getu['ID_DESCRIPTION']."'");
                        $desc = mysqli_fetch_assoc($getdesc);
                        
                        $getphone = mysqli_query($con,"SELECT * FROM `telephone` WHERE `ID_UTILISATEUR`='".$getu['ID_UTILISATEUR']."'");
                        $phone = mysqli_fetch_assoc($getphone);
                        
                        $getmodele = mysqli_query($con,"SELECT * FROM `utilisateur_cv_modele`,`cv_modele` WHERE utilisateur_cv_modele.`ID_UTILISATEUR`='".$getu['ID_UTILISATEUR']."' and utilisateur_cv_modele.ID_MODELE=cv_modele.ID_MODELE");
                        $modele = mysqli_fetch_assoc($getmodele);
                        
                        echo '
                            <tr class="odd gradeX">
                                <td>'.$getu['NOM'].' '.$getu['PRENOM'].'</td>
                                <td><a href="'.$img['PHOTO'].'">Click</a></td>
                                <td>'.$desc['DESCRIPTION'].'</td>
                                <td class="center"> '.$getu['EMAIL'].'</td>
                                <td class="center">'.$phone['TELEPHONE'].'</td>
                                <td class="center"><a href="../user/'.$getu['ID_UTILISATEUR'].'">'.$modele['MODELE'].'</a></td>
                                <td class="center">
                                    <a href="index.php?page=user&action=delete&id='.$getu['ID_UTILISATEUR'].'" class="btn active btn-danger dropdown-toggle tip" id="my-task-list" data-toggle="tooltip" title="SUP"  data-placement="top"><i class="fa fa-times"></i></a>
                                </td>
                              </tr>
                        ';
                    }
                ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>