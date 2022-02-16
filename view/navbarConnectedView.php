<?php ob_start(); ?>

<nav class=" navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myWineNavBar" aria-controls="myWineNavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" onclick="goLandingPage()">
            <img src="public/images/myWineIcon.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> MyWine
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="myWineNavBar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" onclick="goProductPage()">Our wines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#footer">Contact Us</a>
                </li>
            </ul>
        </div>
        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" id="filterProduct" style="display: none;">
            Filter
        </button>
        <form method="post" action="index.php?action=profil" id="form">
            <div class=" mb-3" style="display: none;">
                <input type="email" name="email" class=" form-control" id="email" aria-describedby="emailHelp" value="<?= $myProfil['email'] ?>">
            </div>
            <div class="mb-3" style="display: none;">
                <input type="password" name="password" class="form-control" id="password" value="<?= $myProfil['password'] ?>">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" id="myProfilButton">My profil</button>
            </div>
        </form>

    </div>
</nav>

<script>
    function goLandingPage() {
        document.getElementById('form').action = "index.php?action=signIn";
        document.getElementById('form').submit();
    }

    function goProductPage() {
        document.getElementById('form').action = "index.php?action=productLoading";
        document.getElementById('form').submit();
    }
</script>

<?php $navbarView = ob_get_clean(); ?>