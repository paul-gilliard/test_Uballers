<?php
session_start();


session_destroy(); #Supression session

header("Location: http://www.makeatest.fr/"); #redirection index

?>