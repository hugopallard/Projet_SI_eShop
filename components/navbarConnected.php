<nav class=" navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myWineNavBar" aria-controls="myWineNavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" onclick="goBackLanding()">
            <img src="images/myWineIcon.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> MyWine
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="myWineNavBar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" onclick="goOrLeaveProduct()" aria-current="page">Our wines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#productBody">Discover</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#footer">Contact us</a>
                </li>
            </ul>
        </div>
        <a class="btn btn-primary" onclick="goOrLeaveProfil()" role="button" id="myProfilButton">My profil</a>
    </div>
</nav>

<script>
    function goOrLeaveProfil() {
        document.getElementById("dataForm").submit();
    }

    function goOrLeaveProduct() {
        document.getElementById("dataForm").action = "product.php";
        document.getElementById("dataForm").submit();
    }

    function goBackLanding() {
        document.getElementById("dataForm").action = "landing.php";
        document.getElementById("dataForm").submit();
    }
</script>