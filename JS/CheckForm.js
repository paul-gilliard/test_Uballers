function check() {
    document.getElementById('message').style.visibility = 'visible';
    if (document.getElementById('mail1').value === document.getElementById('mail2').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Correspondance';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Non correspondance';
    }

}
