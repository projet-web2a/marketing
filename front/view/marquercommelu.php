<?php
require "../core/promotionC.php";
session_start();

if(isset($_SESSION['l']))
{
    $promotion= new PromotionC();
    $promotion->MarquerCommeLu($_GET['id_promotion']);
  header("Location:afficherpromotion.php");
}
else
{         $promotion= new PromotionC();
    $promotion->Marquerpromononlu();
    header("Location:afficherpromotion.php");


}

?>