<nav class=" navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myWineNavBar" aria-controls="myWineNavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="landing.php">
            <img src="images/myWineIcon.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> MyWine
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="myWineNavBar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="product.php">Our wines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#productBody">Discover</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#footer">Contact us</a>
                </li>
            </ul>
        </div>
        <a class="btn btn-primary" onclick="submitDatForm()" role="button" id="myProfilButton">My profil</a>
    </div>
</nav>

<!-- This form allows us to send data from landing.php to profil.php
Though, its data is vow to change, have a look at profil.php.
-->
<form method="post" action="profil.php" id="form" style="display: none;">
    <div class="mb-3">
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $email; ?>">
    </div>
    <div class="mb-3">
        <input type="password" name="password" class="form-control" id="password" value="<?php echo $password; ?>">
    </div>
    <div class="mb-3">
        <input type="text" name="firstName" class="form-control" id="firstName" value="<?php echo $firstName; ?>">
    </div>
    <div class="mb-3">
        <input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $lastName; ?>">
    </div>
</form>

<script type="text/javascript">
    function submitDatForm() {
        document.getElementById("form").submit(); // SUBMIT FORM
    }
</script>