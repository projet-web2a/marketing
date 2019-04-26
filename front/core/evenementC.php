<?PHP
include_once "C:/xampp/htdocs/monprojet/front/config.php";
class EvenementC
{


    function afficherEvenement()
    {
        $sql = "SElECT * From evenement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
    function modifierEvenement($evenement,$id){
        $db = config::getConnexion();
        $sql="UPDATE evenement SET  nbrparticipant=:nbrparticipant,nbrvue=:nbrvue  where id_evenement=$id";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);


            $nbrvue=$evenement->getNbrvue();
            $nbrparticipant=$evenement->getNbrparticipant();
           $datas = array(':nbrparticipant'=>$nbrparticipant,':nbrvue'=>$nbrvue);

            $req->bindValue(':nbrparticipant',$nbrparticipant+1);
            $req->bindValue(':nbrvue',$nbrvue+1);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function modifierEvenementdes($evenement,$id){
        $db = config::getConnexion();
        $sql="UPDATE evenement SET  nbrparticipant=:nbrparticipant  where id_evenement=$id";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);


            $nbrparticipant=$evenement->getNbrparticipant();
            $datas = array(':nbrparticipant'=>$nbrparticipant);

            $req->bindValue(':nbrparticipant',$nbrparticipant-1);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function modifierEvenementvue($evenement,$id){
        $db = config::getConnexion();

        $sql="UPDATE evenement SET  nbrvue=:nbrvue  where id_evenement=$id";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);


            $nbrvue=$evenement->getNbrvue();
            $datas = array(':nbrvue'=>$nbrvue);

            $req->bindValue(':nbrvue',$nbrvue+1);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function recupererEvenement($id){
        $db = config::getConnexion();

        $sql="SELECT * from evenement where id_evenement=$id";
        echo "la vie en rose";
        //$req->bindValue(':id_evenement',$id);


        try{

            $liste=$db->query($sql);

            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}

?>