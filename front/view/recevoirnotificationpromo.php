<?php
require "../core/promotionC.php";

$promo=new PromotionC();
$notifs=$promo->AfficherNotif();
$nbr_notif=$notifs->rowCount();
$notifs=$notifs->fetchAll();
?>


<img src="../Img/notif.png" width="18" height="18">
<span class="badge bg-red" ><?php echo $nbr_notif;?></span>



