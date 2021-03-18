<?php
require_once ('../Modele/User.php');

session_start();

try { #Connexion base de données
    $database = new PDO('mysql:host=185.98.131.128;dbname=makea1410798_3ljnlb', 'makea1410798_3ljnlb','AZERTY');
    $SuccesConnection = true;

} catch (Exception $e) {
    die('ERROR : ' . $e->getMessage());
}

if ($SuccesConnection == true) {
    print("connexion réussi");

    #Récupération contenue formulaire
    $login = $_POST["login"];
    $password = $_POST["password"];

    #Verification utilisateur inexistant
    $password=md5($password); #même cryptage qu'à l'inscription
    $rechercheUser = ($database->query("SELECT Mail FROM User WHERE Mail = '{$login}' AND Password = '{$password}' "));
    $rechercheUser= $rechercheUser->fetch();



    if($rechercheUser != false) { #L'utilisateur existe avec ce login et ce password


        #Création User
        $user = new User();
        $user->setPrenom($database->query("SELECT Prenom FROM User WHERE Mail = '{$login}'")->fetch()[0]);
        $user->setDate($database->query("SELECT Date FROM User WHERE Mail = '{$login}'")->fetch()[0]);
        $user->setGenre($database->query("SELECT Genre FROM User WHERE Mail = '{$login}'")->fetch()[0]);
        $user->setMail($database->query("SELECT Mail FROM User WHERE Mail = '{$login}'")->fetch()[0]);
        $user->setNom($database->query("SELECT Nom FROM User WHERE Mail = '{$login}'")->fetch()[0]);
        $user->setPassword($database->query("SELECT Password FROM User WHERE Mail = '{$login}'")->fetch()[0]);


        #print ($user->getNom());

        #Passage de l'USER dans la Session
        $_SESSION["user"] = serialize($user);
        $_SESSION["MessageConnexion"] = "Connexion réussi";


    }
    else{

        $_SESSION["MessageConnexion"] = "Utilisateur non trouvé";

    }

    header("Location: http://www.makeatest.fr/");


}


