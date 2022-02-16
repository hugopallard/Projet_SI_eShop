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
                    <a class="nav-link" onclick="goToProductPage()">Our wines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#footer">Contact Us</a>
                </li>
            </ul>
        </div>
        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" id="filterProduct" style="display: none;">
            Filter
        </button>
        <div>
            <button type="button" class="btn btn-primary d-flex" data-bs-toggle="modal" data-bs-target="#loginModal">
                Sign in
            </button>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-center mt-3 mb-3">
                <h5 class="modal-title" id="modalTittle">Login</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php?action=signIn" id="formConnect">
                    <div class=" mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class=" form-control" id="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end mb-3">Connect</button>
                    </div>
                </form>
                <form method="post" action="index.php?action=signUp" id="formCreate" style="display:none;">
                    <div class=" mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class=" form-control" id="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" name="firstName" class="form-control" id="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" name="lastName" class="form-control" id="lastName" required>
                    </div>
                    <div class="mb-5">
                        <label for="birthDate" class="form-label">Birth Date</label>
                        <input type="date" name="birthDate" class="form-control" id="birthDate" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-end mb-3">Create my account</button>
                    </div>
                </form>
            </div>
            <div class="text-center mb-3">
                <a role="button" onclick="displayCreateForm()" id="createAnAccountBtn">
                    New here ? Click me !
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function goToProductPage() {
        document.getElementById('formConnect').action = "index.php?action=productLoading";
        document.getElementById('formConnect').submit();
    }

    function goLandingPage() {
        document.getElementById('formConnect').action = "index.php?action=signIn";
        document.getElementById('formConnect').submit();
    }

    function displayConnectForm() {
        document.getElementById("formCreate").style.display = "none";
        document.getElementById("formConnect").style.display = "block";
        document.getElementById("modalTittle").innerHTML = "Connect to my account";
        document.getElementById("createAnAccountBtn").innerHTML = "New here ? Click me !";
        document.getElementById('createAnAccountBtn').setAttribute('onclick', 'displayCreateForm()');
    }

    function displayCreateForm() {
        document.getElementById("formCreate").style.display = "block";
        document.getElementById("formConnect").style.display = "none";
        document.getElementById("modalTittle").innerHTML = "Create an account";
        document.getElementById("createAnAccountBtn").innerHTML = "Already have an account ?";
        document.getElementById('createAnAccountBtn').setAttribute('onclick', 'displayConnectForm()');
    }
</script>


<?php $navbarView = ob_get_clean(); ?>