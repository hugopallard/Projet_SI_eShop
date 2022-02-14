<!doctype html>
<html lang="en">

<!-- require the head -->
<?php require 'reusableCode/head.html' ?>

<body>

    <!-- Modal of connection / creation of an account -->
    <?php require 'components/connectOrCreateModal.php';

    // The case an user has CREATED an account successfully
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
            <div class="alert alert-success  alert-dismissible fade show text-center m-0 p-4" role="alert">
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
    // The case if the user is CONNECTED to his account sucessfully
    else if (isset($_POST['userFound']) && $_POST['userFound'] == 1) {
        $hasBeenShowed = $_POST['hasBeenShowed'];
        $currentPage = $_POST['currentPage'];
        // We require the correct navbar
        require 'components/navbarConnected.php';
        if ($hasBeenShowed == 0) {
            $hasBeenShowed = 1;
        ?>
            <div class="alert alert-success  alert-dismissible fade show text-center m-0 p-4" role="alert">
                <strong>Happy to see you back</strong> <?php echo ($_POST['firstName'] . ' ' . $_POST['lastName'] . '  !'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userFound = $_POST['userFound'];
        // We require the dataForm which data will change with the new ones above
        // This form is triggered by the button inside navbarConnected.php
        // The form is currently pointing toward landing.php, but JS below make it point toward profil.php
        require 'reusableCode/dataForm.php';
    }
    // The case if the user has TRIED to connect and FAIL
    else if (isset($_POST['userFound']) && $_POST['userFound'] == 0) {
        require 'components/navbarSignIn.html';
        ?>
        <div class="alert alert-danger alert-dismissible fade show text-center m-0 p-4" role="alert">
            <strong>User does not exist. Try again </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    // Else, if the user didnt connect or create an account (with or without errors), we require the default navBar
    else {
        require 'components/navbarSignIn.html';
        require 'reusableCode/dataForm.php';
    }
    ?>

    <!-- Script -->
    <div id="content">
        <div id="carouselExampleSlidesOnly" class="carousel carousel-dark slide" data-bs-ride="carousel" style="height: 100vh;">
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 100vh;">
                    <picture>
                        <source media="(min-width:1440px)" srcset="images/wineBigScreen.png">
                        <source media="(min-width:1024px)" srcset="images/wineLittleScreen.jpg">
                        <source media="(min-width:768px)" srcset="images/wineTablette.jpg">
                        <source media="(min-width:320px)" srcset="images/wineMobile.jpeg">
                        <img src="images/wineBigScreen.png">
                    </picture>
                    <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="color:white">
                        <h1>Discover our wines</h1>
                        <h4 class="mb-5">Picked by our experts for you</h4>
                        <div class="container"><a class="btn btn-primary" href="#productBody" role="button">Discover</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pb-5" id="productBody">
            <div class="text-center pt-3 pb-5">
                <h2 id="productBodyTittle">Our most recent wines</h2>
            </div>
            <div class="row g-5 pb-5">
                <?php
                $lines = 1;
                while ($lines <= 4) {
                ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
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
            <div class="container">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        <div class=" container-fluid" id="aboutBody">
            <div class="text-center pt-3 pb-5">
                <h2>About us</h2>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-center">
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
                <div class="col-sm-12 col-md-6 p-0 d-flex align-items-center justify-content-end">
                    <img src="images/wineStain.png" alt="wine art" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- Footer of the page -->
        <?php require 'components/footer.html'; ?>
    </div>


    <script>
        // We change the action attribute of the dataForm
        document.getElementById("dataForm").action = "profil.php";

        function goToProduct() {
            document.getElementById("dataForm").action = "product.php";
            document.getElementById("dataForm").submit();
        }
    </script>

</body>

</html>