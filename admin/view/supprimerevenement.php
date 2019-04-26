<?PHP
include "../entite/evenement.php";
include "../core/evenementC.php";
$_SESSION['prenom'] = 'hane';
$_SESSION['user'] = 'hanehene';
$evenementC=new EvenementC();

if (isset($_POST['id_evenement'])){
    echo "la vie est belle";
   // $participationC->supprimerParticipation($_POST['id_evenement'],$_SESSION['user']);
    $evenementC->supprimerEvenement($_POST['id_evenement']);
    header('Location: ../espacevenement.php');



}


?>