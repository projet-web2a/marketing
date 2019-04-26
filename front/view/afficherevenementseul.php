<?PHP
session_start();
$_SESSION['prenom'] = 'hane';
$_SESSION['user'] = 'hanehene';
include "../entite/participation.php";
include "../core/participationC.php";
$participationC = new ParticipationC();
$result=$participationC->recupererParticipation($_POST['id_evenement'],$_SESSION['user']);

var_dump($result);
if ($result==false)
    header('Location: afficherparticipationajouter.php?id='.$_POST['id_evenement']);
else
    header('Location: afficherparticipationsupprimer.php?id='.$_POST['id_evenement']);
//if (empty($result))

?>