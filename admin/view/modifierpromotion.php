<?php
if (empty($_SESSION['l']) && empty($_SESSION['p']))
{

    header('Location: authentificationmarketing.php');

    /*  echo 'Votre login est <b>'.$_SESSION['l'].'</b> <br>et votre mot de passe est <b>'.$_SESSION['p'].
        '</b><br>Votre role est : '.$_SESSION['r'].' <br/> Identifiant de la session est :'.session_id().'</br>';
    echo '<a href="./logout.php">Cliquer pour se déconnecter</a>';
    */
}

?>
<HTML>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EyeZone Login</title>
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
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>EyeZone</h1>
                            </div>
                            <p>Welcome to the Admin Dashbord</p>
                            <?PHP
                            include "../entite/promotion.php";
                            include "../core/promotionC.php";
                            if (isset($_GET['id_promotion'])){

                                $promotionC=new PromotionC();
                                echo' la vie en rose';
                                $result=$promotionC->recupererPromotion($_GET['id_promotion']);
                                foreach($result as $row){


                                    $datedebut=$row['datedebut'];
                                    $datefin=$row['datefin'];
                                    $idProduit=$row['idProduit'];
                                    $categorie=$row['categorie'];
                                    $taux=$row['taux'];
                                    ?>
                                    <form method="POST" action="modifierpromo.php" onclick="compar()">
                                        <table>
                                            <caption>Modifier Promotion</caption>


                                            <tr>
                                                <td>Date debut</td>
                                                <td><input type="date" name="datedebut" value="<?PHP echo $datedebut ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Date fin</td>
                                                <td><input type="date" name="datefin" value="<?PHP echo $datefin ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Réference</td>
                                                <td><input type="text" name="idProduit" value="<?PHP echo $idProduit ?>"></td>
                                            </tr>
                                            <tr>
                                            <td>Catégorie</td>
                                            <td><input type="text" name="categorie" value="<?PHP echo $categorie ?>"></td>
                                            </tr>
                                            <tr>
                                            <td>Taux</td>
                                            <td><input type="number" step="0.01" name="taux" value="<?PHP echo $taux ?>"></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td><input type="submit" name="modifier" value="modifier"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id_promotion'];?>"></td>
                                            </tr>
                                        </table>
                                    </form>
                                    <?PHP
                                }
                            }



                            ?>
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

<!-- JavaScript files-->
<script>
    function compar()
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
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/popper.js/umd/popper.min.js"> </script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- Main File-->
<script src="../js/front.js"></script>

</body>
</HTMl>