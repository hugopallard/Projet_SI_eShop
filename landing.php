<!doctype html>
<html lang="en">

<!-- require the head (which require BoostrapJS as well -->
<?php require 'reusableCode/head.html' ?>

<body>
    <?php
    $isConnected = false;
    // The case if the user CONNECT to his account sucessfully, go back to landing.php, print the correct navBar with the correct alert
    if (isset($connectUsers)) {
        while ($myUser = $connectUsers->fetch()) {
            if ($myUser['email'] == $email && $myUser['password'] == $password) {
                //echo "User exists";
                $firstName = $myUser['firstName'];
                $lastName = $myUser['lastName'];
                $email = $myUser['email'];
                $password = $myUser['password'];
                $userFound = true;
                $isConnected = true;
                require 'components/navbarConnected.php';
    ?>
                <div class="alert alert-success  alert-dismissible fade show text-center" role="alert">
                    <strong>Happy to see you back</strong> <?php echo ($myUser['firstName'] . ' ' . $myUser['lastName'] . '  !'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php

            }
        }
        if ($myUser == false && $isConnected == false) {
            //echo "User does not exist";
            require 'components/navbarSignIn.html';
            $userFound = false;
            $isConnected = false;
            ?>
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>User does not exist. Try again </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
    }
    // The case if the user CREATE an account sucessfully, go back to landing.php, print the correct navBar with the correct alert
    else if (isset($newUser) || (isset($email) && isset($password))) {
        require 'components/navbarConnected.php';
        ?>
        <div class="alert alert-success  alert-dismissible fade show text-center" role="alert">
            <strong>Welcome</strong> <?php echo ($firstName . ' ' . $lastName . '  !'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    // The case when user go back from profil.php to landing.php
    else if (isset($_POST['email']) && isset($_POST['password'])) {
        // We retrieve data from the form in navBarConnected.php now pointing toward landing.php from profil.php
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        require 'components/navbarConnected.php';
    }
    // The default case (landingPage)
    else {
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

    <!-- Modal of connection / creation of an account -->
    <?php require 'components/connectOrCreateModal.html' ?>


    <!-- My JS -->
    <script>
        const targetDiv = document.getElementById("createAccountData");
        const btn = document.getElementById("switchForm");
        btn.onclick = function() {
            if (targetDiv.style.display !== "none") {
                targetDiv.style.display = "none";
                document.getElementById("modalTittle").innerHTML = "Login";
                document.getElementById("switchForm").innerHTML = "Or create an account";
                document.getElementById("form").action = "connectAccount.php";
                document.getElementById("firstName").required = false;
                document.getElementById("lastName").required = false;
                document.getElementById("birthDate").required = false;
            } else {
                targetDiv.style.display = "block";
                document.getElementById("modalTittle").innerHTML = "Sign up";
                document.getElementById("switchForm").innerHTML = "Login instead";
                document.getElementById("form").action = "createAccount.php";
                document.getElementById("firstName").required = true;
                document.getElementById("lastName").required = true;
                document.getElementById("birthDate").required = true;
            }
        }
    </script>

</body>

</html>