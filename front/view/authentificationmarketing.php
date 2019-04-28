<?php

session_start ();

if (empty($_SESSION['l']) && empty($_SESSION['p'])  )
{

    header('Location: loginmarketing.php');
}
else
{

}
// On récupère nos variables de session

//définir la session une session est un tableau temporaire
//1 er point c quoi une session
//
?>