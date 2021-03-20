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
               <div class = item-inscription1>
                   <div class="wrap-inscription">
                       <input type="text" placeholder="Prénom" name="prenom" required style="width: 80%;margin-right: 10px;height: 30px">
                       <input type="text" placeholder="Nom de famille" name="nom" required style="width: 80%;height: 30px">
                   </div> <br>
               </div>

                <div class = item-inscription1>
                    <div class="wrap-inscription">
                        <input type="text" placeholder="Numéro de mobile ou email" name="mail" id="mail1" required style="width: 100%;height: 30px">
                    </div><br>
                </div>

                <div class = item-inscription1>
                    <div class="wrap-inscription">
                        <input type="text" placeholder="Confirmer numéro de mobile ou email" name="mail2" id="mail2" required onkeyup="check()" style="width: 100%;height: 30px">
                    </div>
                </div>

                <div style="margin-left:5% ">
                    <span id='message' style="visibility: collapse; margin: auto" ></span>
                </div>

                <div class = item-inscription1>
                    <div class="wrap-inscription">
                        <input type="password" placeholder="Nouveau mot de passe" name="password" id="password" required style="width: 100%;height: 30px" onkeyup="checkPass()">
                    </div>
                </div>

                <div style="margin-left:5% ">
                    <span id='messagePass' style="visibility: collapse"></span>
                </div>
        </div>


        <div id="container-registration2">
        <b> <label style="margin-left: 5%;" >Date de naissance</label></b>

         <div class = item-inscription-date>
             <select name="jour" id="jour" required>
                 <option value="">Jour</option>
                 <option value="01">1</option>
                 <option value="02">2</option>
                 <option value="03">3</option>
                 <option value="04">4</option>
                 <option value="05">5</option>
                 <option value="06">6</option>
                 <option value="07">7</option>
                 <option value="08">8</option>
                 <option value="09">9</option>
                 <option value="10">10</option>
                 <option value="11">11</option>
                 <option value="12">12</option>
                 <option value="13">13</option>
                 <option value="14">14</option>
                 <option value="15">15</option>
                 <option value="16">16</option>
                 <option value="17">17</option>
                 <option value="18">18</option>
                 <option value="19">19</option>
                 <option value="20">20</option>
                 <option value="21">21</option>
                 <option value="22">22</option>
                 <option value="23">23</option>
                 <option value="24">24</option>
                 <option value="25">25</option>
                 <option value="26">26</option>
                 <option value="27">27</option>
                 <option value="28">28</option>
                 <option value="29">29</option>
                 <option value="30">30</option>
                 <option value="31">31</option>
             </select>

             <select name="mois" id="mois" required>
                 <option value="">Mois</option>
                 <option value="01">Janvier</option>
                 <option value="02">Février</option>
                 <option value="03">Mars</option>
                 <option value="04">Avril</option>
                 <option value="05">Mai</option>
                 <option value="06">Juin</option>
                 <option value="07">Juillet</option>
                 <option value="08">Août</option>
                 <option value="09">Septembre</option>
                 <option value="10">Octobre</option>
                 <option value="11">Novembre</option>
                 <option value="12">Décembre</option>
             </select>

             <select name="annee" id="annee" required>
                 <option value="">Année</option>
                 <option value="1980">1980</option>
                 <option value="1981">1981</option>
                 <option value="1982">1982</option>
                 <option value="1983">1983</option>
                 <option value="1984">1984</option>
                 <option value="1985">1985</option>
                 <option value="1986">1986</option>
                 <option value="1987">1987</option>
                 <option value="1988">1988</option>
                 <option value="1989">1989</option>
                 <option value="1990">1990</option>
                 <option value="1991">1991</option>
                 <option value="1992">1992</option>
                 <option value="1993">1993</option>
                 <option value="1994">1994</option>
                 <option value="1995">1995</option>
                 <option value="1996">1996</option>
                 <option value="1997">1997</option>
                 <option value="1998">1998</option>
                 <option value="1999">1999</option>
                 <option value="2001">2001</option>
                 <option value="2002">2002</option>
                 <option value="2003">2003</option>
                 <option value="2004">2004</option>
                 <option value="2005">2005</option>
                 <option value="2006">2006</option>
                 <option value="2007">2007</option>
                 <option value="2008">2008</option>
                 <option value="2009">2009</option>
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
                <a href="" > Politique d'utilisation des données</a>, y compris notre <a href="" > Utilisation des cookies</a>. Vous pourrez recevoir des notifications
        par texto de la part de Facebook et pouvez vous désabonner à tout moment.
        </div>
        <br>
        <div class="bouton-inscription">
            <input type="submit" value='Inscription' id="bouton-inscription">
        </div>
        </div>
        </form>
    </body>
</html>