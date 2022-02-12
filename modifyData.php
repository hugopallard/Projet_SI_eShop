<?php

require 'reusableCode/createInstancePDO.php';

$firstName = strip_tags($_POST['profilFirstName']);
$lastName = strip_tags($_POST['profilLastName']);
$email = strip_tags($_POST['profilEmail']);
$password = strip_tags($_POST['profilPassword']);
$dataModified = strip_tags($_POST['dataModified']);


if (
    !isset($_POST['profilEmail']) || !isset($_POST['profilPassword']) || !isset($_POST['profilFirstName']) || !isset($_POST['profilLastName'])
    || $_POST['profilEmail'] == "" ||  $_POST['profilPassword'] == "" ||  $_POST['profilFirstName'] == "" ||  $_POST['profilLastName'] == ""
) {
    $dataModified = 0;
    // There is an error because either one of the variables from profilForm of profil.php is missing or one of them is NULL
    // So we require the dataForm
    require 'reusableCode/dataForm.php';
    // The data form now has all the data of profilFom from profil.php
} else {
    // Préparation
    $modifyDataOfUser = $db->prepare('UPDATE users SET FirstName = :firstName, LastName = :lastName, Email = :email, Password = :password WHERE Email = email AND Password = :password');

    // Exécution ! La requette est maintenant en base de données
    $modifyDataOfUser->execute([
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'password' => $password,
    ]);
    $dataModified = 1;
    // So we require the dataForm
    require 'reusableCode/dataForm.php';
    // The data form now has all the data of profilFom from profil.php

}

?>
<script>
    // We force the submit of the dataForm
    // and make it point toward profil.php
    document.getElementById("dataForm").action = "profil.php";
    // we will return to profil.php no matter meeting an issue modifying the data or not
    document.getElementById("dataForm").submit();
</script>