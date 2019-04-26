<?PHP
include_once "C:/xampp/htdocs/monprojet/admin/config.php";
class PromotionC
{
    function afficherPromotion()
    {
        $sql = "SElECT * From promotion";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouterPromotion($promotion)
    {echo"la vie en rose";
        $db = config::getConnexion();
        $sql = "INSERT INTO promotion(id_promotion,datedebut,datefin,idProduit,categorie,taux,prixfinal) VALUES(:id_promotion,:datedebut,:datefin,:idProduit,:categorie,:taux,:prixfinal)";

        try {
            $req = $db->prepare($sql);

            $id_promotion = $promotion->getId();
            $datedebut = $promotion->getDatedebut();
            $datefin = $promotion->getDatefin();
            $idProduit = $promotion->getRefe();
            $categorie = $promotion->getCategorie();
            $taux = $promotion->getTaux();
            $prixfinal = $promotion->getPrix();

            $req->bindValue(':id_promotion', $id_promotion);
            $req->bindValue(':datedebut', $datedebut);
            $req->bindValue(':datefin', $datefin);
            $req->bindValue(':idProduit', $idProduit);
            $req->bindValue(':categorie', $categorie);
            $req->bindValue(':taux', $taux);
            $req->bindValue(':prixfinal', $prixfinal);

            echo"la vie en rose";

            $req->execute();
            // header('Location: ../espacemarketing.php');

        } catch (Exception $e) {

            // header('Location: ../register.php');
            echo 'Erreur: ' . $e->getMessage();
            return false;
        }
    }


    function supprimerPromotion($id)
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM promotion where id_promotion= :id_promotion";

        $req = $db->prepare($sql);
        $req->bindValue(':id_promotion', $id);
        try {
            $req->execute();
            // header('Location: index.php');
        } catch (Exception $e) {

            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierPromotion($promotion,$id){
        $db = config::getConnexion();
        $sql="UPDATE promotion SET datedebut=:datedebut, datefin=:datefin,idProduit=:idProduit,categorie=:categorie,taux=:taux,prixfinal=:prixfinal where id_promotion=$id";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);

           // $id_promotion = $promotion->getId();
            $datedebut = $promotion->getDatedebut();
            $datefin = $promotion->getDatefin();
            $idProduit = $promotion->getRefe();
            $categorie = $promotion->getCategorie();
            $taux = $promotion->getTaux();
    $prixfinal = $promotion->getPrix();

            $datas = array( ':datedebut'=>$datedebut, ':datefin'=>$datefin,':idProduit'=>$idProduit,':categorie'=>$categorie,':taux'=>$taux,':prixfinal'=>$prixfinal );
         //   $req->bindValue(':id_promotion', $id_promotion);
            $req->bindValue(':datedebut', $datedebut);
            $req->bindValue(':datefin', $datefin);
            $req->bindValue(':idProduit', $idProduit);
            $req->bindValue(':categorie', $categorie);
            $req->bindValue(':taux', $taux);
           $req->bindValue(':prixfinal', $prixfinal);





            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function recupererPromotion($id){
        $db = config::getConnexion();
        echo "la vie en rose1";

        $sql="SELECT * from promotion where id_promotion=$id";
        echo "la vie en rose2";


        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function rechercherListepromotion($par){
        $db = config::getConnexion();
        $sql="SELECT * from promotion where categorie=$par";
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
  function calculerPrix($id)
  {
      $db = config::getConnexion();
  $sql="SELECT prix from produit where refe=$id";

      try{
          $ancienprix=$db->query($sql);
        //  echo"nnn";
          $ancienprix->execute();
          $ancienprix1=$ancienprix->fetch();
          return $ancienprix1;
      }
      catch (Exception $e){
          die('Erreur: '.$e->getMessage());
      }




  }
    function recupererUrl($id)
    {
        $db = config::getConnexion();
        $sql="SELECT url from produit where refe=$id";

        try{
            $ancienprix=$db->query($sql);
            //  echo"nnn";
            $ancienprix->execute();
            $ancienprix1=$ancienprix->fetch();
            return $ancienprix1;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }




    }
    public function trier($par)
    {
        $sql="SELECT * FROM promotion order by $par ";

        $db = config::getConnexion();
try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function afficherProduit()
    {
        $sql = "SElECT * From produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function Ajouternotifcation($refe,$url,$prixfinal,$prix,$lu)
    {
        $database=config::GetConnexion();
        $req = $database->prepare("INSERT INTO notificationpromo(idNot,refe,url,prixfinal,prix,lu) Values(0,:refe,:url,:prixfinal,:prix,0)");

        $req->bindValue(':refe', $refe);
        $req->bindValue(':url', $url);
        $req->bindValue(':prixfinal', $prixfinal);
        $req->bindValue(':prix', $prix);
        $req->bindValue(':lu', $lu);

        echo"la vie en rose";

        $req->execute();
    }
}


?>