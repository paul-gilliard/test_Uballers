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
    <script src="JS/CheckForm.js"></script>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<div id="container-login">

    <form action="Controller/login.php" method="post">
       <div class="item-connexion1">
           <div class="item-connexion2">
            <label class="label-login"><b>Adresse e-mail ou mobile</b></label>
            <input type="text" placeholder="Votre login" name="login" required class="input-login">
               <a href="" class="small_href"> </a>
           </div>
           <div class="item-connexion2">
            <label class="label-login"><b>Mot de passe</b></label>
            <input type="password" placeholder="Votre mot de passe" name="password" required class="input-login"><br>
               <label class="label-login"> <a href="" class="small_href">Informations de compte oubliées ? </a></label>
           </div>
           <div class="item-connexion3">
            <input type="submit" value='Connexion' class="bouton-connexion" id="bouton-connexion">
           </div>
       </div>
    </form>
</div>

<div id="container-registration">

<div class="Titre">
    <h2 style="margin: 5px">Inscription</h2>
        <h4 style="margin: 5px"> C'est gratuit (et ça le restera toujours) </h4>
</div>

    <form action="Controller/registration.php" method="post">
       <div class = item-inscription1><div class="wrap-inscription"> <input type="text" placeholder="Prénom" name="prenom" required style="width: 80%;margin-right: 10px">
               <input type="text" placeholder="Nom de famille" name="nom" required style="width: 80%"></div> <br> </div>
        <div class = item-inscription1> <div class="wrap-inscription"> <input type="text" placeholder="Numéro de mobile ou email" name="mail" id="mail1" required style="width: 100%"></div><br></div>
        <div class = item-inscription1> <div class="wrap-inscription">  <input type="text" placeholder="Confirmer numéro de mobile ou email" name="mail2" id="mail2" required onkeyup="check()" style="width: 100%">
            </div></div><div style="margin-left:5% "><span id='message' style="visibility: collapse; margin: auto" ></span> </div>
        <div class = item-inscription1> <div class="wrap-inscription">  <input type="password" placeholder="Nouveau mot de passe" name="password" required style="width: 100%"></div> <br></div>


<br>
       <b> <label style="margin-left: 5%;" >Date de naissance</label></b>

        <div class = item-inscription-date>
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
            <a href="" class="small_href_date" style="margin-left: 10px"> Pourquoi indiquer ma date <br>  de naissance ? </a>
        </div>
        <div class = item-inscription-genre>
            <br>
            <input type="radio" id="female" name="genre" value="Femme" required>
            <label for="female" style="margin-right: 30px">Femme</label>
            <input type="radio" id="homme" name="genre" value="Homme">
            <label for="homme">Homme</label>

</div>
        <div class="conditions"> En cliquant sur inscription, <a href="">vous acceptez nos <a href="" > Conditions </a> et indiquez que vous avez lu notre
                <a href="" > Politique d'utilisation des données </a>, y compris notre <a href="" > Utilisation des cookies</a>. Vous pourrez recevoir des notifications
        par texto de la part de Facebook et pouvez vous désabonner à tout moment.</div>

        <br>
        <div class="bouton-inscription">
        <input type="submit" value='Inscription' id="bouton-inscription">
        </div>
        </div>

    </form>
</div>
</body>
</html>