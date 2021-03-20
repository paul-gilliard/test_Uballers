<?php
require_once ('../Modele/User.php');

session_start();

try { #Connexion base de données
    $database = new PDO('mysql:host=185.98.131.128;dbname=makea1410798_3ljnlb', 'makea1410798_3ljnlb','AZERTY');

} catch (Exception $e) {
    die('ERROR : ' . $e->getMessage());
}

#Récupération contenue formulaire
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$mail=$_POST["mail"];
$password = $_POST["password"];
$genre = $_POST["genre"];
$jour = $_POST["jour"];
$mois = $_POST["mois"];
$annee = $_POST["annee"];
$date= $annee."-".$mois."-".$jour;

#Verification utilisateur inexistant
$mailDatabase = ($database->query("SELECT Mail FROM User WHERE Mail = '{$mail}' LIMIT 1"));
$mailDatabase = $mailDatabase->fetch();


if($mailDatabase == false) { #L'adresse mail n'est pas dans la BDD

    $password = md5($password); #cryptage password pour la BDD
    #préventions injections de base avec l'objet PDO
    $insert = $database->exec("INSERT INTO User (Prenom, Nom, Mail, Password, Date, Genre) VALUES ('$prenom','$nom','$mail','$password','$date','$genre')");


    #Création User
    $user = new User($prenom, $nom, $mail, $password, $date, $genre);

    #Passage de l'USER dans la Session
    $_SESSION["user"] = serialize($user);
    $_SESSION["MessageInscription"] = "Inscription réussi avec Succès";
}



else{

    $_SESSION["MessageInscription"] = "Email déjà utilisé";

}

header("Location: http://www.makeatest.fr/");





