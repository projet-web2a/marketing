<?PHP
session_start ();

if (empty($_SESSION['l']) && empty($_SESSION['p']))
{

    header('Location: authentificationmarketing.php');

    /*  echo 'Votre login est <b>'.$_SESSION['l'].'</b> <br>et votre mot de passe est <b>'.$_SESSION['p'].
          '</b><br>Votre role est : '.$_SESSION['r'].' <br/> Identifiant de la session est :'.session_id().'</br>';
      echo '<a href="./logout.php">Cliquer pour se déconnecter</a>';
  */
}



$login=$_SESSION['l'];
$role=$_SESSION['r'];

include_once "../core/evenementC.php";
include_once "../core/promotionC.php";
$promotionC=new PromotionC();
$evenement=new EvenementC();
$listepromotion=$promotionC->afficherPromotion();
//$nbr=$listepromotion->rowcount();
$listenbr=$evenement->totaleparticipant();
$nbr=0;
foreach ($listenbr as $ro)
{
    $nbr=$ro['nbrparticipant']+$nbr;
}
$listevenement=$promotionC->afficherEvenement();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EyeZone | Marketing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div class="page">
    <!-- Main Navbar-->
    <header class="header">
        <nav class="navbar">
            <!-- Search Box-->
            <div class="search-box">
                <button class="dismiss"><i class="icon-close"></i></button>
                <form id="searchForm" action="#" role="search">
                    <input type="search" placeholder="What are you looking for..." class="form-control">
                </form>
            </div>
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <!-- Navbar Header-->
                    <div class="navbar-header">
                        <!-- Navbar Brand --><a href="../index.php" class="navbar-brand d-none d-sm-inline-block">
                            <div class="brand-text d-none d-lg-inline-block"> EyeZone</div>
                            <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                        <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Search-->
                        <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                        <!-- Notifications-->
                        <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner"><?php echo $nbr ?></span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <?php foreach ($listevenement as $row){


                                    ?>
                                    <li><a rel="nofollow" href="#" class="dropdown-item">

                                            <div class="notification">
                                                <div class="notification-content"><i class="fa fa-envelope bg-green"></i><?php echo $row["nom_evenement"]?></div>
                                                <div class="notification-time"><small><?PHP echo $row["nbrparticipant"] ?></small></div>
                                            </div></a></li>
                                    <?php
                                }
                                ?>

                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                            </ul>
                        </li>
                        <!-- Messages                        -->
                        <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">10</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="../img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="../img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="../img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
                            </ul>
                        </li>
                        <!-- Languages dropdown    -->
                        <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                            <ul aria-labelledby="languages" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="../img/flags/16/DE.png" alt="English" class="mr-2">German</a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="../img/flags/16/FR.png" alt="English" class="mr-2">French                                         </a></li>
                            </ul>
                        </li>
                        <!-- Logout    -->
                        <li class="nav-item"><a href="../login.html" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="../img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h4"><?php echo $login?></h1>
                    <p><?php echo $role ?></p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
                <li><a href="../index.php"> <i class="icon-home"></i>Home </a></li>
                <li><a href="../tables.html"> <i class="icon-grid"></i>Produits </a></li>
                <li><a href="../charts.html"> <i class="fa fa-bar-chart"></i>Commandes </a></li>                <li><a href="forms.html"> <i class="icon-padnote"></i>Clients </a></li>
                <li><li class="active"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Marketing</a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="espacevenement.php">Evenement</a></li>
                        <li><a href="espacepromotion.php">Promotion</a></li>
                    </ul>
                </li>
                <li><a href="../login.html"> <i class="icon-interface-windows"></i>Livraisons </a></li>
                <li><a href="../login.html"> <i class="icon-interface-windows"></i>Service aprés vente </a></li>
            </ul><span class="heading">Extras</span>
            <ul class="list-unstyled">
                <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>
            </ul>
        </nav>
        <div class="content-inner">
            <!-- Page Header-->
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Marketing</h2>
                </div>
            </header>
            <!-- Breadcrumb-->
            <div class="breadcrumb-holder container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Marketing</li>
                </ul>
            </div>
                <!-- Form Panel    -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-close">
                        <div class="dropdown">
                            <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>

                            <h1>Evenement à ajouter</h1>
                            <form method="post"  action="ajouterevenement.php" onclick="compar()"  id="enregisterevenement" >
                                <div class="form-group">
                                    <label for="Nom" id="label" class="form-control-label"><strong>Nom de l'événement</strong></label>

                                    <input id="Nom" type="text" name="Nom" required data-msg="Entrez le nom de l'événement" class="input-material">
                                </div>
                                <div class="form-group">
                                    <label for="Datedebut"  id="label" class="form-control-label"><strong>Date début</strong></label>

                                    <input id="Datedebut" type="date" name="Datedebut" required data-msg="Entrez la date de début de l'événement" class="input-material">

                                </div>
                                <div class="form-group">
                                    <label for="Datefin"  id="label" class="form-control-label"><strong>Date fin</strong></label>

                                    <input id="Datefin" type="date" name="Datefin" required data-msg="Entrez la date de fin de l'événement" class="input-material">
                                </div>
                                <div class="form-group">
                                    <label for="Image"  id="label" class="form-control-label"><strong>Image</strong> </label>

                                    <input id="Image" type="file" name="Image"  required class="input-material">

                                </div>
                                <div class="form-group">
                                    <label for="Description" id="label" class="form-control-label"><strong>Description</strong></label>

                                    <input id="Description" type="text" name="Description" required data-msg="Entrez la description de l'événement" class="input-material">
                                </div>
                                <input id="formsend" type="submit" name="formsend"  class="btn btn-primary">
                                <a href="espacevenement.php"  class="btn btn-primary">Retour</a>

                                <!-- <a id="login"  class="btn btn-primary">Login</a>-->
                                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                            </form> <br/>



                            <!-- <a id="login"  class="btn btn-primary">Login</a>-->

                            <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                            <a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.php" class="signup">Signup</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights text-center">
        <p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
    </div>
</div>
<script>
    function compar()
    {
    {
        // var sdate1 = document.getElementById('Datedebut').value;
        var date1 = new Date(document.getElementById('Datedebut').value);
        var date2 = new Date(document.getElementById('Datefin').value);


        if(date1>date2)
        {
            alert('Vous avez selectionné une date incorrecte!!');
        }


    }
    </script>
<!-- JavaScript files-->
<script src="../js/dateevenement.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/popper.js/umd/popper.min.js"> </script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- Main File-->
<script src="../js/front.js"></script>
</body>
</html>