<?php

require 'reusableCode/createInstancePDO.php';

if (!isset($_POST['email']) || !isset($_POST['password']))
{
	//echo('Il faut remplir tous les champs pour soumettre le formulaire');
    return;
}

$email = $_POST['email'];
$password = $_POST['password'];

/*
echo $email;
echo $password;
*/

// On récupère tout le contenu de la table users
$connectUsers = $db->query("SELECT email, password, firstName, lastName FROM users WHERE email = '$email' AND password = '$password' LIMIT 1");
require('landing.php');
