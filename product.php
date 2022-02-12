<!DOCTYPE html>
<html lang="en">

<?php require 'reusableCode/head.html'; ?>

<body>
    <!-- Modal of connection / creation of an account -->
    <?php require 'components/connectOrCreateModal.php';
    if (isset($_POST['userCreated']) && $_POST['userCreated'] == 1) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userCreated = $_POST['userCreated'];
        $hasBeenShowed = $_POST['hasBeenShowed'];
        $currentPage = $_POST['currentPage'];
        // We require the correct navbar
        require 'components/navbarConnected.php';
        if ($hasBeenShowed == 0) {
            $hasBeenShowed = 1;
    ?>
            <div class="alert alert-success  alert-dismissible fade show text-center" role="alert">
                <strong>Welcome</strong> <?php echo ($_POST['firstName'] . ' ' . $lastName . '  !'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        // We require the dataForm which data will change with the new ones above
        // This form is triggered by the button inside navbarConnected.php
        // The form is currently pointing toward landing.php, but JS below make it point toward profil.php
        require 'reusableCode/dataForm.php';
    }
    // The case if the user CONNECT to his account sucessfully
    else if (isset($_POST['userFound']) && $_POST['userFound'] == 1) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userFound = $_POST['userFound'];
        $hasBeenShowed = $_POST['hasBeenShowed'];
        $currentPage = $_POST['currentPage'];
        // We require the correct navbar
        require 'components/navbarConnected.php';
        if ($hasBeenShowed == 0) {
            $hasBeenShowed = 1;
        ?>
            <div class="alert alert-success  alert-dismissible fade show text-center" role="alert">
                <strong>Happy to see you back</strong> <?php echo ($_POST['firstName'] . ' ' . $_POST['lastName'] . '  !'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        // We require the dataForm which data will change with the new ones above
        // This form is triggered by the button inside navbarConnected.php
        // The form is currently pointing toward landing.php, but JS below make it point toward profil.php
        require 'reusableCode/dataForm.php';
    }
    // The case if the user TRIES to connect and FAIL
    else if (isset($_POST['userFound']) && $_POST['userFound'] == false) {
        require 'components/navbarSignIn.html';
        ?>
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>User does not exist. Try again </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    } else {
        require 'components/navbarSignIn.html';
    }
    ?>
    <h1>TEST</h1>
</body>

<script>
    document.getElementById("dataForm").action = "profil.php";
</script>

</html>