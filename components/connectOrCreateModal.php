<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-center mt-3">
                <h5 class="modal-title" id="modalTittle">Login</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="connectAccount.php" id="form">
                    <div class=" mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class=" form-control" id="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div id="createAccountData" style="display: none;">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" name="firstName" class="form-control" id="firstName">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" name="lastName" class="form-control" id="lastName">
                        </div>
                        <div class="mb-3">
                            <label for="birthDate" class="form-label">Birth Date</label>
                            <input type="date" name="birthDate" class="form-control" id="birthDate">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="currentPage" class="form-control" id="currentPage" value="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary align-item-end">Submit</button>
                    </div>
                </form>
            </div>
            <div class="text-center mb-3">
                <a aria-current="page" href="#" id="switchForm">Or create an account</a>
            </div>
        </div>
    </div>
</div>

<script>
    // ---------------
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