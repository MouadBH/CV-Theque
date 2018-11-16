<div id="container">
<?php
if (isset($_POST['added'])) {
$inst = checkin($_POST['inst']);
$form = checkin($_POST['form']);
$db= checkin($_POST['db']);
$df = checkin($_POST['df']);
$desc=checkin($_POST['desc']);
if (empty($inst) or empty($form) or empty($df) or empty($db) ) {
# code...
$error = true;
$_SESSION['err_msg'] = "S'il vous plaît entrez les informations.";
header("Location: dashboard?page=education&err=empty");
exit;
}else{

$quer=mysqli_query($con,"INSERT INTO `generale_date`(`DATE`) VALUES ('".$db."')");
$id_db1=mysqli_query($con,"SELECT `ID_DATE` FROM `generale_date` order by `ID_DATE` desc limit 1 ");
$id_db=mysqli_fetch_assoc($id_db1);

$quer=mysqli_query($con,"INSERT INTO `generale_date`(`DATE`) VALUES ('".$df."')");
$id_df1=mysqli_query($con,"SELECT `ID_DATE` FROM `generale_date` order by `ID_DATE` desc limit 1 ");
$id_df=mysqli_fetch_assoc($id_df1);

if (empty($desc)) {
$id_desc=1;
}else{ 
$query=mysqli_query($con,"INSERT INTO `description`(`DESCRIPTION`)VALUES ('".$desc."') ");
$id_desc1=mysqli_query($con,"SELECT `ID_DESCRIPTION`from `description` order by `ID_DESCRIPTION` DESC limit 1 ");
$id_desc=mysqli_fetch_assoc($id_desc1);
} 
$query2=mysqli_query($con,"INSERT INTO `education`(`ID_UTILISATEUR`, `ID_DATE_DEBUT`, `ID_DATE_FIN`, `ID_DESCRIPTION`, `LIBELLE`, `INSTITUT`) VALUES('".$id."','".$id_db['ID_DATE']."','".$id_df['ID_DATE']."','".$id_desc['ID_DESCRIPTION']."','".$form."','".$inst."') "); 
}
}


if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){
    $compid = $_GET['id'];
    $deltel = mysqli_query($con,"DELETE FROM `education` WHERE ID_EDUCATION='".$compid."'");            
    header("Location: dashboard?page=education");
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
<h4>Ajouter <span class="semi-bold"> Education </span></h4>
<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
</div>
<div class="grid-body no-border"> <br>

<form action="" method="post">
<div class="form-group">
<label class="form-label">Institut</label>
<div class="input-with-icon right"> 
<i class=""></i>
<input type="text" name="inst" id="form1Name" class="form-control"> 
</div>
</div>
<div class="form-group">
<label class="form-label">Formation</label>
<div class="input-with-icon right"> 
<i class=""></i>
<input type="text" name="form" id="form1Name" class="form-control"> 
</div>
</div>
<div class="form-group">

<div class="row form-row">
<div class="col-md-12">
<div class="col-md-6">
<div class="input-with-icon right">
<i class=""></i>
<label class="form-label">DATE DEBUT</label>
<input name="db" id="form1City" type="date" placeholder="Date Début" class="form-control" >
</div>
</div>
<div class="col-md-6">
<div class="input-with-icon right">
<i class=""></i>
<label class="form-label">DATE FIN</label>
<input name="df" id="form1State" type="date" placeholder="Date Fin" class="form-control" >
</div>
</div>
</div>
</div>
</div>
<div class="form-group">
<label class="form-label">Description</label>
<div class="input-with-icon right"> 
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
<th>INSTITUT</th>
<th>LIBELLE</th>
<th>DATE DEBUT</th>
<th>DATE FIN</th>
<th>DESCRIPTION</th>

</tr>
</thead>
<tbody>
<?php
$INST = mysqli_query($con,"select * from education where ID_UTILISATEUR='".$id."'");

$i=1;

while ($inst1 = mysqli_fetch_assoc($INST)) {

$DATE_DEBUT=mysqli_query($con,"select * from generale_date where ID_DATE=(select ID_DATE_DEBUT from education where ID_UTILISATEUR='".$id."' and ID_EDUCATION='".$inst1['ID_EDUCATION']."') ");
$db = mysqli_fetch_assoc($DATE_DEBUT);

$DATE_FIN=mysqli_query($con,"select * from generale_date where ID_DATE=(select ID_DATE_fin from education where ID_UTILISATEUR='".$id."' and ID_EDUCATION='".$inst1['ID_EDUCATION']."')");
$df = mysqli_fetch_assoc($DATE_FIN);

$DESC=mysqli_query($con,"select * from description where id_description=(select ID_DESCRIPTION from education where ID_UTILISATEUR='".$id."' and ID_EDUCATION='".$inst1['ID_EDUCATION']."') ");
$des1 = mysqli_fetch_assoc($DESC);

echo '
<tr>
<td>'.$i.'</td>
<td>'.$inst1['INSTITUT'].'</td>
<td>'.$inst1['LIBELLE'].'</td>
<td>'.$db['DATE'].'</td>
<td>'.$df['DATE'].'</td>
<td>'.$des1['DESCRIPTION'].'</td>
<td><a href="dashboard?page=education&action=delete&id='.$inst1['ID_EDUCATION'].'" class="btn btn-danger btn-cons"> Supprimer</a></td>
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