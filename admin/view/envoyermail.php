<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 31/03/2019
 * Time: 20:11
 */
include "../entite/promotion.php";
include "../core/promotionC.php";
if (isset($_POST['envoyer'])){
  $to=$_POST['destination'] ;
//$to='hane.bhar@esprit.tn';
$sujet='test';
$text=$_POST['description'];
$entete='From : user \n';
$entete .="Reply-to: user \n";
$entete .= "MIME-Version: 1.0 \n";
$entete .="Content-type: multipart/mixed;";
    $image=$_FILES['image']['name'];

move_uploaded_file($_FILES['file']['tmp_name'],$image);
//$header='From :henebhar@gmail.com';


    mail($to,$sujet,$text,$entete);
echo $text;
  /*$evenementC->modifierEvenement($evenement,$_POST['id_ini']);
    echo $_POST['id_ini'];
   */// header('Location: espacevenement.php');

}