<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=myeshopprojetsi;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    //erreur
    return;
}
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$currentPage = strip_tags($_POST['currentPage']);

echo $email;
echo $password;
// User isnt found at this stage
$userFound = 0;
// On récupère tout le contenu de la table users
$connectUsers = $db->query("SELECT firstName, lastName, email, password FROM users WHERE email = '$email' AND password = '$password' LIMIT 1");

while ($myUser = $connectUsers->fetch()) {
    if ($myUser['email'] == $email && $myUser['password'] == $password) {
        $firstName = $myUser['firstName'];
        $lastName = $myUser['lastName'];
        $email = $myUser['email'];
        $password = $myUser['password'];
        $userFound = 1;
        $hasBeenShowed = 0;
    }
}
if ($myUser == false && $userFound != 1) {
    //echo "User does not exist";
    $userFound = 0;
}
// At this point we have all the data of the connected user or not, let's pass those data to landing.php
// using a hidden form component in 'reusableCode/dataForm.php'

require 'reusableCode/dataForm.php';


?>

<script>
    // We force the submit
    document.getElementById("dataForm").action = "<?php echo $currentPage; ?>";
    document.getElementById("dataForm").submit();
</script>