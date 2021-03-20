function check() { //vérifie en regex si telephone ou mail valide
    document.getElementById('message').style.visibility = 'visible';
    if (document.getElementById('mail1').value === document.getElementById('mail2').value) {
        if(validerEmail(document.getElementById('mail1').value )){
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Correspondance';
            document.getElementById('bouton-inscription').disabled="";
        }
        else {
            if (validerTel(document.getElementById('mail1').value)) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Correspondance';
                document.getElementById('bouton-inscription').disabled="";
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Rentrez un mail ou un téléphone';
                document.getElementById('bouton-inscription').disabled="false";
            }
        }


    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Non correspondance';
        document.getElementById('bouton-inscription').disabled="false";
    }

}

function checkPass() { // vérifie en regex si password valide
    document.getElementById('messagePass').style.visibility = 'visible';
        if(validerString(document.getElementById('password').value )){
            document.getElementById('messagePass').style.color = 'green';
            document.getElementById('messagePass').innerHTML = 'Valide';
            document.getElementById('bouton-inscription').disabled="";
        }
        else {
        document.getElementById('messagePass').style.color = 'red';
        document.getElementById('messagePass').innerHTML = ' Mot de passe de 5 à 30 caractères';
        document.getElementById('bouton-inscription').disabled="false";
        }

}

/**
 *
 * @param email
 * @returns {boolean}
 */
function validerEmail(email) {
    var re = /\S+@\S+.\S+/;
    return re.test(email);

}

/**
 *
 * @param tel
 * @returns {boolean}
 */
function validerTel(tel){
    var re = /^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/;
    return re.test(tel)
}

/**
 *
 * @param string
 * @returns {boolean}
 */
function validerString(string) {
    var re = /\b\w{5,30}\b/;
    return re.test(string);
}


