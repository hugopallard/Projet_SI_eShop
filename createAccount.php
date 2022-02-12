<?php
require 'reusableCode/createInstancePDO.php';

if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['birthDate']) || !isset($_POST['email']) || !isset($_POST['password']))
{
	//echo('Il faut remplir tous les champs pour soumettre le formulaire');
    return;
}

$firstName = strip_tags($_POST['firstName']);
$lastName = strip_tags($_POST['lastName']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);

// Préparation
$newUser = $db->prepare('INSERT INTO users(FirstName, LastName, Email, Password) 
VALUES (:firstName, :lastName, :email, :password)');

// Exécution ! La requette est maintenant en base de données
$newUser->execute([
    'firstName' => $firstName,
    'lastName' => $lastName,
    'email' => $email,
    'password' => $password,
]);
require 'landing.php';
