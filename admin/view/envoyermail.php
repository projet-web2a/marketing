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
//$text=$_POST['description'];
//$header='From :henebhar@gmail.com';
    $text=' <!DOCTYPE html>

<html>
      <head>
            <meta charset="utf-8">
             <title>Welcome to my world </title>
              <link rel="stylesheet" href="../css/carte.css">
      </head>

      <body>
      	<div id="carte">

<h1>Voilà mon CV</h1>
           <p>Bonjour,je me présente:Hane Bhar une étudiante responsable et engagée à ESPRIT en IT.<br>
           J\'ai 20 ans douée dans la communication avec les autres et la prise en charge des responsabilités.</p>

      </body>


</html>';
mail($to,$sujet,$text);
echo $text;
  /*$evenementC->modifierEvenement($evenement,$_POST['id_ini']);
    echo $_POST['id_ini'];
   */ header('Location: espacevenement.php');

}