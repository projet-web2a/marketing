<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 28/04/2019
 * Time: 23:39
 */
require_once 'C:/xampp/htdocs/monprojet/front/config.php';

class produit
{   function afficherProduit()
{
    $sql = "SElECT * From produit WHERE promo=!0";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

}