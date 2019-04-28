<?PHP
include "../entite/promotion.php";
include "../core/promotionC.php";


$promotion1=new Promotion(0,$_POST['Datedebut'],$_POST['Datefin'],$_POST['IdProduit'],$_POST['Categorie'], $_POST['Taux'],0,0);

$promotion1C=new PromotionC();

$ancienprix=$promotion1C->calculerPrix($_POST['IdProduit']);
$url=$promotion1C->recupererUrl($_POST['IdProduit']);
var_dump($ancienprix);
//$val=floatval($ancienprix);
//$resultat= array(':ancienprix'=>$ancienprix);
//echo $resultat[':ancienprix'];
$nouvprix=($ancienprix['prix']*($_POST['Taux']))/100;
echo $_POST['Taux'];
//echo $val;
//$promotion1C->Ajouternote($_POST['IdProduit'],$url['url'],$nouvprix,$ancienprix['prix'],0);
$promotion1C->Modifierproduit($_POST['IdProduit'],$_POST['Taux']);
$promotion1=new Promotion(0,$_POST['Datedebut'],$_POST['Datefin'],$_POST['IdProduit'],$_POST['Categorie'],$_POST['Taux'], $nouvprix,0);

$bool=$promotion1C->ajouterPromotion($promotion1);

   header('Location: espacepromotion.php');

?>
