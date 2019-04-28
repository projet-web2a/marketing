<?PHP

include "../entite/participation.php";
include "../core/participationC.php";
include "../entite/evenement.php";
$_SESSION['prenom'] = 'hane';
$_SESSION['user'] = 'hanehene';

if (isset($_POST['supprimer'])) {

    $evenementC = new EvenementC();
    echo ' la vie en rose';
    $result = $evenementC->recupererEvenement($_POST['id_evenement']);
    foreach($result as $row) {

        $id_evenement = $row['id_evenement'];
        $nom_evenement = $row['nom_evenement'];
        $datedebut = $row['datedebut'];
        $datefin = $row['datefin'];
        $nbrparticipant = $row['nbrparticipant'];
        $nbrvue = $row['nbrvue'];
        $image = $row['image'];
        $description = $row['description'];
    }
    $evenement=new Evenement($id_evenement,$nom_evenement,$datedebut,$datefin,$nbrparticipant,$nbrvue,$image,$description);
    $evenementC->modifierEvenementdes($evenement,$id_evenement);

}
$participationC=new ParticipationC();

if (isset($_POST['supprimer'])){
      var_dump($result);
    $participationC->supprimerParticipation($_POST['id_evenement'],$_SESSION['user']);
   header('Location: afficherevenement.php');

}


?>