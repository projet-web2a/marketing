<?PHP
include "../entite/utilisateur.php";
include "../core/crudutilisateurC.php";

if ( isset($_POST['nom']) and isset($_POST['password']) and isset($_POST['mail'])){
    $utilisateur1=new Utilisateur($_POST['nom'],$_POST['password'],$_POST['mail']);

    $utilisateur1C=new UtilisateurC();
    $utilisateur1C->ajouterUtilisateur($utilisateur1);
  //  header('Location: afficher.php');

}else{
    echo "vérifier les champs";
}


?>