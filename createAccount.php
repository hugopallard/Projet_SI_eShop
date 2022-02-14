<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=myeshopprojetsi;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['birthDate']) || !isset($_POST['email']) || !isset($_POST['password'])) {
    //echo('Il faut remplir tous les champs pour soumettre le formulaire');
    $userCreated = 0;
    return;
}

$firstName = strip_tags($_POST['firstName']);
$lastName = strip_tags($_POST['lastName']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$birthDate = strip_tags($_POST['birthDate']);
$currentPage = strip_tags($_POST['currentPage']);
$hasBeenShowed = 0;

// Préparation
$newUser = $db->prepare('INSERT INTO users(FirstName, LastName, BirthDate, Email, Password) VALUES (:firstName, :lastName, :birthDate, :email, :password)');

// Exécution !
$newUser->execute([
    'firstName' => $firstName,
    'lastName' => $lastName,
    'birthDate' => $birthDate,
    'email' => $email,
    'password' => $password,
]);
$userCreated = 1;
// At this point we have all the data of the created user, let's pass those data to landing.php
// using a hidden form component in 'reusableCode/dataForm.php'
require 'reusableCode/dataForm.php';
?>

<script>
    // We force the submit
    document.getElementById("dataForm").action = "<?php echo $currentPage; ?>";
    document.getElementById("dataForm").submit();
</script>