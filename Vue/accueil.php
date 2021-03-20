<?php
session_start();
require_once ('../Modele/User.php');

if ($_SESSION['user']=="") #Utilisateur non connecté
{
    header("Location: http://www.makeatest.fr/"); #redirection index
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Vous êtes connectés</title>

</head>
<body>
<?php
$user = unserialize($_SESSION['user']); #Récupération de l'user pour afficher ses informations

echo ("Bonjour ". $user->getPrenom());

?>

<a href="../Controller/logout.php"> Deconnexion </a>
</body>
</html>


