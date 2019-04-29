<?PHP
include "../entite/promotion.php";
include "../core/promotionC.php";
$promotion1C=new PromotionC();

$dsc=$promotion1C->recupererdesc($_POST['IdProduit']);

$promotion1=new Promotion(0,$_POST['Datedebut'],$_POST['Datefin'],$_POST['IdProduit'],$dsc['descr'], $_POST['Taux'],0,0);


$ancienprix=$promotion1C->calculerPrix($_POST['IdProduit']);
$url=$promotion1C->recupererUrl($_POST['IdProduit']);
var_dump($ancienprix);
//$val=floatval($ancienprix);
//$resultat= array(':ancienprix'=>$ancienprix);
//echo $resultat[':ancienprix'];
$nouvprix=($ancienprix['prix']-($ancienprix['prix']*($_POST['Taux'])))/100;
echo $_POST['Taux'];
//echo $val;
//$promotion1C->Ajouternote($_POST['IdProduit'],$url['url'],$nouvprix,$ancienprix['prix'],0);
$promotion1C->Modifierproduit($_POST['IdProduit'],$_POST['Taux']);
$promotion1=new Promotion(0,$_POST['Datedebut'],$_POST['Datefin'],$_POST['IdProduit'],$dsc['descr'],$_POST['Taux'], $nouvprix,0);

$bool=$promotion1C->ajouterPromotion($promotion1);
$to="hane.bhar@esprit.tn" ;

$sujet=" NOUVELLE article en Promotion!!!!!!";
$delim=md5(uniqid(rand()));
echo $delim;

$entete='From : user \n';
$entete .="Reply-to: user \n";
$entete .= "MIME-Version: 1.0 \n";
$entete .="Content-Type: multipart/mixed;boundary=\"$delim\" \n";

$fichier="../img/".$url['url'];
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
   header('Location: espacepromotion.php');

?>
