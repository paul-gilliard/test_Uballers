<?php
require_once ('../Modele/User.php');

session_start();

try { #Connexion base de données
    $database = new PDO('mysql:host=185.98.131.128;dbname=makea1410798_3ljnlb', 'makea1410798_3ljnlb','AZERTY');

} catch (Exception $e) {
    die('ERROR : ' . $e->getMessage());
}


 #Récupération contenue formulaire
$login = $_POST["login"];
$password = $_POST["password"];

#Verification utilisateur inexistant
$password=md5($password); #même cryptage qu'à l'inscription
$rechercheUser = ($database->query("SELECT Mail FROM User WHERE Mail = '{$login}' AND Password = '{$password}' "));
$rechercheUser= $rechercheUser->fetch();



if($rechercheUser != false) { #L'utilisateur existe avec ce login et ce password

#prenom,nom,mail,pass,date,genre

    #Création User
    $result = ($database->query("SELECT * FROM User WHERE Mail = '{$login}'"));
    $user = new User($result->fetch()[1],$result->fetch()[2],$result->fetch()[3],$result->fetch()[4],$result->fetch()[5],$result->fetch()[6]);


    #Passage de l'USER dans la Session
    $_SESSION["user"] = serialize($user);
    $_SESSION["MessageConnexion"] = "Connexion réussi";


}
else{

    $_SESSION["MessageConnexion"] = "Utilisateur non trouvé";

}

header("Location: http://www.makeatest.fr/");





