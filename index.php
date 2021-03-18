<?php
session_start();
require_once ('./Modele/User.php');

#Check si message à afficher
if ($_SESSION['MessageInscription'] != "") {
    UniqueAfficheMessage('MessageInscription');
}
if ($_SESSION['MessageConnexion'] != "") {
    UniqueAfficheMessage('MessageConnexion');
    }

function UniqueAfficheMessage($clef){ #Depuis la clef dans $_Session, affiche les messages des Controllers une unique fois

        $message = ($_SESSION[$clef]);
        echo "<script type='text/javascript'>alert('$message');</script>";
        unset($_SESSION[array_search($message, $_SESSION)]);# Renitialisation en cas de refresh
}

#Redirection si utilisateur Connecté
if($_SESSION['user']!=""){ #Utilisateur connecté
    header("Location: http://www.makeatest.fr/Vue/accueil.php"); #redirection accueil
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Uballers Paul</title>
</head>
<center>
<body>
<div id="container-login">

    <form action="Controller/login.php" method="post">
        <label><b>Adresse e-mail ou mobile</b></label>
        <input type="text" placeholder="Votre login" name="login" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Votre mot de passe" name="password" required>

        <input type="submit" value='connexion' >

    </form>
</div>

<div id="container-registration">


        <h3> Inscription </h3>
        <h4> C'est gratuit (et ça le restera toujours) </h4>

    <form action="Controller/registration.php" method="post">
        <input type="text" placeholder="Prénom" name="prenom" required>
        <input type="text" placeholder="Nom de famille" name="nom" required> <br>
        <input type="text" placeholder="Numéro de mobile ou email" name="mail" required><br>
        <input type="text" placeholder="Confirmer numéro de mobile ou email" name="mail2" required> <br>
        <input type="password" placeholder="Nouveau mot de passe" name="password" required> <br>

        <label>Date de naissance</label>

        <select name="jour" id="jour" required>
            <option value="">Jour</option>
            <option value="01">1</option>
            <option value="02">2</option>
            <option value="03">3</option>
            <option value="31">31"</option>
        </select>
        <select name="mois" id="mois" required>
            <option value="">Mois</option>
            <option value="01">Janvier</option>
            <option value="02">Février</option>
            <option value="12">Décembre</option>
        </select>
        <select name="annee" id="annee" required>
            <option value="">Année</option>
            <option value="1990">1990</option>
            <option value="2000">2000</option>
        </select>

        <br>
        <input type="radio" id="female" name="genre" value="Femme" required>
        <label for="female">Femme</label>

        <label for="homme">Homme</label>
        <input type="radio" id="homme" name="genre" value="Homme">



        <br>
        <input type="submit" value='Inscription' >

    </form>
</div>
</body>
</center>
</html>