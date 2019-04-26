<?PHP
include "../entite/promotion.php";
include "../core/promotionC.php";
$promotionC=new PromotionC();

if (isset($_POST['id_promotion'])){
    echo "la vie est belle";
    $promotionC->supprimerPromotion($_POST['id_promotion']);
    header('Location: ../espacepromotion.php');

}


?>