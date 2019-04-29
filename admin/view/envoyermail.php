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

  $sujet=$_POST['description'];
$delim=md5(uniqid(rand()));
echo $delim;

$entete='From : user \n';
$entete .="Reply-to: user \n";
$entete .= "MIME-Version: 1.0 \n";
$entete .="Content-Type: multipart/mixed;boundary=\"$delim\" \n";

$fichier="../img/".$_POST['image'];
    //$fichier= "../img/evenement1.jpg";
    $jointe= file_get_contents($fichier);
    $jointe=chunk_split(base64_encode($jointe));
    $text ="Content-Type: image/jpeg;name\"image.jpg\" \n";
    $text .="Content-Transfer-Encoding: base64 \n";
    $text .="Content-Disposition: attachment; filename=\"image.jpg\"\n";
    $text .="\n";
    $text .=$jointe;
    $text .="\n";
    $text .='--$delim--';

    mail($to,$sujet,$text,$entete);

  header('Location: espacevenement.php');

}