<?php

require 'reusableCode/createInstancePDO.php';

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    //echo('Il faut remplir tous les champs pour soumettre le formulaire');
    return;
}
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$currentPage = strip_tags($_POST['currentPage']);

// On récupère tout le contenu de la table users
$connectUsers = $db->query("SELECT email, password, firstName, lastName FROM users WHERE email = '$email' AND password = '$password' LIMIT 1");
while ($myUser = $connectUsers->fetch()) {
    if ($myUser['email'] == $email && $myUser['password'] == $password) {
        $firstName = $myUser['firstName'];
        $lastName = $myUser['lastName'];
        $email = $myUser['email'];
        $password = $myUser['password'];
        $userFound = 1;
        $hasBeenShowed = 0;
    } else {
        //echo "User does not exist";
    }
}
// At this point we have all the data of the connected user or not, let's pass those data to landing.php
// using a hidden form component in 'reusableCode/dataForm.php'

require 'reusableCode/dataForm.php';

// This form has all the data necessary such has $firstName, $lastName, $email and $password of the potential user
// if the user trying to connect doesnt exist, those variables are equal to ""

?>

<script>
    // We force the submit
    document.getElementById("dataForm").action = "<?php echo $currentPage; ?>";
    document.getElementById("dataForm").submit();
</script>