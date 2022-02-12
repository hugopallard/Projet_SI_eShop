<!doctype html>
<html lang="en">

<!-- require the head -->
<?php require 'reusableCode/head.html' ?>

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

    <!-- Script -->
    <div id="content">
        <div class="container-fluid" id="landingBody">
            <div class="row" style="height: 100vh;">
                <div class=" col-6 p-0 d-flex align-items-center">
                    <img src="images/wineArt.png" alt="wine art" class="img-fluid">
                </div>
                <div class="col-6 d-flex align-items-center justify-content-center">
                    <div class=" text-center">
                        <h1>Discover our wines</h1>
                        <h4 class="mb-5">Picked by our experts for you</h4>
                        <a class="btn btn-primary" href="#productBody" role="button">Discover</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pb-5" id="productBody">
            <div class="text-center pt-3 pb-5">
                <h2 id="productBodyTittle">Our most recent wines</h2>
            </div>
            <div class="row row-cols-4 g-5 pb-5">
                <?php
                $lines = 1;
                while ($lines <= 4) {
                ?>
                    <div class="col">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-6">
                                    <img src="images/wineBottle.png" class="img-fluid" alt="...">
                                </div>
                                <div class="col-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This
                                            is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little
                                            bit
                                            longer.
                                        </p>
                                    </div>
                                </div>
                                <div class="d-grid p-3">
                                    <button class="btn btn-primary" type="button">Discover</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $lines++;
                }
                ?>

            </div>
            <div class="row justify-content-md-center">
                <div class="col-4 d-grid ps-5 pe-5">
                    <button class="btn btn-primary" type="button">More wine !</button>
                </div>
            </div>
        </div>
        <div class=" container-fluid" id="aboutBody">
            <div class="text-center pt-3 pb-5">
                <h2>About us</h2>
            </div>
            <div class="row">
                <div class="col-6 d-flex align-items-center justify-content-center">
                    <div class=" text-center">
                        <h3>We are an team of expert</h3>
                        <h4 class="mb-3">Our values are:</h4>
                        <div class="container mb-5">
                            <div class="row">
                                <div class="col-12">
                                    <h5>Quality</h5>
                                </div>
                                <div class="col-12">
                                    <h5>Client-first</h5>
                                </div>
                                <div class="col-12">
                                    <h5>Audacity</h5>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="#productBody" role="button">Know more about
                            us</a>
                    </div>
                </div>
                <div class="col-6 p-0 d-flex align-items-center justify-content-end">
                    <img src="images/wineStain.png" alt="wine art" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer of the page -->
    <?php require 'components/footer.html'; ?>

    <script>
        // We change the action attribute of the dataForm
        document.getElementById("dataForm").action = "profil.php";
    </script>

</body>

</html>