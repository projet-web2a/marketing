<?PHP
include "../entite/utilisateur.php";
include "../core/crudutilisateurC.php";
include '../config.php';

$utilisateur1=new Utilisateur($_POST['registerUsername'],$_POST['registerPassword'],$_POST['registerEmail']);

$utilisateur1C=new UtilisateurC();

$utilisateur1C->ajouterUtilisateur($utilisateur1);

?>
