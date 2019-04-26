<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EyeZone Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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


                            $promotion1C=new PromotionC();
                            $listePromotion=$promotion1C->afficherEvenement();

                            //var_dump($listeEmployes->fetchAll());
                            ?>
                            <table border="1">
                                <tr>
                                    <td>Date debut de la promotion</td>
                                    <td>Date fin de la promotion</td>
                                    <td>La réference</td>
                                    <td>La catégorie</td>
                                    <td>Le taux</td>
                                </tr>
                                <?PHP
                                foreach($listeEvenement as $row){
                                    ?>
                                    <tr>

                                        <td><?PHP echo $row['datedebut']; ?></td>
                                        <td><?PHP echo $row['datefin']; ?></td>
                                        <td><?PHP echo $row['idProduit']; ?></td>
                                        <td><?PHP echo $row['categorie']; ?></td>
                                        <td><?PHP echo $row['taux']; ?></td>
                                        <td><form method="GET" action="modifierpromotion.php">
                                                <input type="submit" name="modifier" value="modifier" class="btn btn-primary">
                                                <input type="hidden" value="<?PHP echo $row['id_promotion']; ?> " name="id_promotion">
                                            </form>


                                        <td><form method="POST" action="supprimerpromotion.php" >
                                                <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
                                                <input type="hidden" value="<?PHP echo $row['id_promotion']; ?> " name="id_promotion" >
                                            </form>

                                            <!-- <td><form method="GET" action="chercherevenement.php">
                                                     <input type="submit" name="chercher" value="chercher" class="btn btn-primary">
                                                     <input type="hidden" value="" name="datedebut">
                                                 </form>
                                 -->        </tr>

                                    <?PHP
                                }

                                ?>

                            </table>

                            <td><form method="POST" action="view/formulairevenement.php" >
                                    <input type="submit" name="ajouter" value="ajouter" class="btn btn-primary">
                                </form>
                            <td><form method="POST" action="index.html" >
                                    <input type="submit" name="retour" value="retour" class="btn btn-primary">
                                </form>
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
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/popper.js/umd/popper.min.js"> </script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- Main File-->
<script src="js/front.js"></script>
</body>
</html>

