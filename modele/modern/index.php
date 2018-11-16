
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="http://localhost/proj/cv/modele/modern/" >
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $nom." ".$prenom; ?> CV Online</title>
 
    <!-- favicon -->
    <link href="favicon.png" rel=icon>

    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

    <!-- font-awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- owl carousal -->
    <link href="css/owl.carousel.css" rel="stylesheet">

    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="main-wrapper">
<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-img">
                    <img src="<?php echo $fetch_img['PHOTO']; ?>" class="img-responsive" alt=""/>
                </div>
                <!-- Profile Image -->
            </div>
            <div class="col-md-9">
                <div class="name-wrapper">
                    <h1 class="name"><?php echo $nom." ".$prenom; ?></h1>
                </div>
                <p style="font-size: 20px;font-weight: bold;">
                    <?php
                    while($udesc = mysqli_fetch_assoc($selectdesc)){
                        echo $udesc['DESCRIPTION'];
                    }
                    ?>
                </p>

            </div>
        </div>
    </div>
</header>
<!-- .header-->

<section class="section-wrapper skills-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-title">
                    <h2>Skills</h2>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="progress-wrapper">

                            <h3>COMPETENCES</h3>

                            
                                <?php
                                while($ucomp = mysqli_fetch_assoc($selectcomp)){
                                    echo '
                                    <div class="progress-item">
                                    <span class="progress-title">'.$ucomp['LIBELLE'].'</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="'.$ucomp['NIVEAU'].'" aria-valuemin="0"
                                             aria-valuemax="100" style="width: '.$ucomp['NIVEAU'].'%"><span
                                                class="progress-percent"> '.$ucomp['NIVEAU'].'%</span>
                                        </div>
                                    </div>
                                    <!-- .progress -->
                                    </div>
                            <!-- .skill-progress -->
                                    ';
                                }
                                ?>
                        </div>
                        <!-- /.progress-wrapper -->
                    </div>
                    <div class="col-md-6">
                        <div class="progress-wrapper">
                            <h3>LANGUES</h3>
                            <?php
                        while ($ulang = mysqli_fetch_assoc($selectlang)) {
                            echo '
                            <div class="progress-item">
                                <span class="progress-title"> '.$ulang['LANGUE'].'</span>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="'.$ulang['LANGUE_NIVEAU'].'" aria-valuemin="0"
                                         aria-valuemax="100" style="width: '.$ulang['LANGUE_NIVEAU'].'%"><span
                                            class="progress-percent"> '.$ulang['LANGUE_NIVEAU'].'%</span>
                                    </div>
                                </div>
                                <!-- .progress -->
                            </div>
                            <!-- .skill-progress -->
                            ';
                        }
                        ?>
                            

                        </div>
                        <!-- /.progress-wrapper -->
                    </div>
                </div>
                <!--.row -->
            </div>
        </div>

    </div>
    <!-- .container-fluid -->
</section>
<!-- .skills-wrapper -->

<section class="section-wrapper section-experience">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-title"><h2> EDUCATION</h2></div>
            </div>
            <div class="col-md-9">
                <div class="row">
                <?php
                while ($EDU=mysqli_fetch_assoc($seledtedu)) {
                        //selectioner INSTITUT et LIBELLE from ici
                        $EDU_exact=mysqli_query($con,"select * from `education` where ID_UTILISATEUR='".$id."' and ID_EDUCATION='".$EDU['ID_EDUCATION']."' ");
                        $feduex = mysqli_fetch_assoc($EDU_exact);
                        //selectioner les datesfrom ici
                        $EDU_Date_debut=mysqli_query($con,"select * from generale_date where ID_DATE='".$EDU['ID_DATE_DEBUT']."'");
                        $fedb = mysqli_fetch_assoc($EDU_Date_debut);
                        $EDU_Date_fin=mysqli_query($con,"select * from generale_date where ID_DATE='".$EDU['ID_DATE_FIN']."'");
                        $dedf = mysqli_fetch_assoc($EDU_Date_fin);
                        //selectioner la desciption ici
                        $EDU_desc=mysqli_query($con,"select * from `description` where ID_DESCRIPTION='".$EDU['ID_DESCRIPTION']."'");
                        $ded = mysqli_fetch_assoc($EDU_desc);

                        echo '
                        <div class="col-md-6">
                            <div class="content-item">
                                <small>'.substr($fedb['DATE'],0,4).'-'.substr($dedf['DATE'],0,4).'</small>
                                <h3>'.$feduex['LIBELLE'].'</h3>
                                <h4>'.$feduex['INSTITUT'].'</h4>

                                <p>'.$ded['DESCRIPTION'].'</p>
                            </div>
                            <!-- .experience-item -->
                        </div>
                        ';
                    }
                ?>
                    
                </div>
            </div>
            <!--.row-->
        </div>
    </div>
    <!-- .container -->
</section>
<!-- .section-experience -->

<section class="section-education section-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-title"><h2>Certificat</h2></div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                    while($CERT=mysqli_fetch_assoc($selectCert)) {
                        //selectioner AUTEUR et LIBELLE from ici
                        $CERT_exact=mysqli_query($con,"select * from Certificat where ID_UTILISATEUR='".$id."' and ID_CERTIFICAT='".$CERT['ID_CERTIFICAT']."' ");
                        $feduex = mysqli_fetch_assoc($CERT_exact);
                        //selectionner les datesfrom ici
                        $CERT_DATE=mysqli_query($con,"select * from generale_date where ID_DATE='".$feduex['ID_DATE']."'");
                        $fedb = mysqli_fetch_assoc($CERT_DATE);
                        
                        #//selectioner la desciption ici
                        $CERT_desc=mysqli_query($con,"select * from `description` where ID_DESCRIPTION='".$CERT['ID_DESCRIPTION']."'");
                        $ded = mysqli_fetch_assoc($CERT_desc);

                        echo '
                        <div class="content-item">
                            <small>'.substr($fedb['DATE'],0,4).'</small>
                            <h3>'.$feduex['LIBELLE'].'</h3>
                            <h4>'.$feduex['AUTEUR'].'</h4>

                            <p>'.$ded['DESCRIPTION'].'</p>
                        </div>
                        <!-- .experience-item -->
                        ';
                    }
                ?>

                </div>
                <!--.row-->
            </div>

        </div>
        <!--.row-->
    </div>
    <!-- .container -->
</section>
<!-- .section-education -->

<section class="section-education section-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-title"><h2>L'EXPERIENCE</h2></div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                <?php
                while ($EXP=mysqli_fetch_assoc($selectExp)) {
                        //selectioner LIEU EXPERINECE et ROLE from ici
                        $EXP_exact=mysqli_query($con,"select * from `experience` where ID_UTILISATEUR='".$id."' and ID_EXPERIENCE='".$EXP['ID_EXPERIENCE']."' ");
                        $feduex = mysqli_fetch_assoc($EXP_exact);
                        //selectioner les dates from ici
                        $EXP_Date_debut=mysqli_query($con,"select * from generale_date where ID_DATE='".$EXP['ID_DATE_DEBUT']."'");
                        $fedb = mysqli_fetch_assoc($EXP_Date_debut);

                        $EXP_Date_fin=mysqli_query($con,"select * from generale_date where ID_DATE='".$EXP['ID_DATE_FIN']."'");
                        $dedf = mysqli_fetch_assoc($EXP_Date_fin);
                        //selectioner la desciption ici
                        $EXP_desc=mysqli_query($con,"select * from `description` where ID_DESCRIPTION='".$EXP['ID_DESCRIPTION']."'");
                        $ded = mysqli_fetch_assoc($EXP_desc);

                        echo '
                        <div class="col-md-6">
                            <div class="content-item">
                                <small>'.substr($fedb['DATE'],0,4).'-'.substr($dedf['DATE'],0,4).'</small>
                                <h3>'.$feduex['LIEU_EXPERIENCE'].'</h3>
                                <h4>'.$feduex['ROLE'].'</h4>

                                <p>'.$ded['DESCRIPTION'].'</p>
                            </div>
                            <!-- .experience-item -->
                        </div>
                        ';
                        
                    }
                ?>

                </div>
                <!--.row-->
            </div>

        </div>
        <!--.row-->
    </div>
    <!-- .container -->
</section>
<!-- .section-education -->


<section class="section-contact section-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-title">
                    <h2>Contact</h2>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <address>
                            <strong>Address</strong><br>
                            <?php echo $uaddr['RUE']; ?><br>
                            <?php echo $uaddr['VILLE'].", ".$uaddr['PAYE']; ?>

                        </address>
                    </div>
                    <div class="col-md-3">
                        <address>
                            <strong>Phone Number</strong><br>
                            <?php
                            while ($uphone = mysqli_fetch_assoc($selectphone)) {
                                echo $uphone['TELEPHONE'].'<br>';
                            }
                            ?>
                        </address>
                    </div>
                    <div class="col-md-3">
                        <address>
                            <strong>Email</strong><br>
                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                        </address>
                    </div>

                </div>
                <!--.row-->
            </div>
        </div>
        <!--.row-->

    </div>
    <!--.container-fluid-->
</section>
<!--.section-contact-->

<footer class="footer">
    <div class="copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copytext">&copy;  All rights reserved | Design By: <a
                            href="">CV-théque</a></div>
                </div>
            </div>
            <!--.row-->
        </div>
        <!-- .container-fluid -->
    </div>
    <!-- .copyright-section -->
</footer>
<!-- .footer -->

</div>
<!-- #main-wrapper -->

<!-- jquery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!--owl carousal-->
<script src="js/owl.carousel.min.js"></script>
<!--theme script-->
<script src="js/scripts.js"></script>
</body>
</html>