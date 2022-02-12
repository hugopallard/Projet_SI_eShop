<!DOCTYPE html>
<html lang="en">
<!-- require the head -->
<?php require 'reusableCode/head.html' ?>

<body>
  <?php require 'components/navbarConnected.php' ?>
  <!-- Do something -->
  <div class="text-center" id="profilContent">
    <h1 class="pt-5 mb-5"> My profil </h1>
    <div class="container">
      <div class="row row-cols-2" style="height: auto;">
        <div class="col d-flex align-items-center justify-content-center">
          <img src="images/myWineIcon.png" class="img-fluid" alt="...">
        </div>
        <div class="col">
          <form method="post" action="modifyData.php" id="profilForm">
            <div class="mb-3">
              <input type="email" name="email" class="form-control" id="profilEmail" aria-describedby="emailHelp" value="<?php echo $_POST['email']; ?>" disabled>
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control" id="profilPassword" value="<?php echo $_POST['password']; ?>" disabled>
            </div>
            <div class="mb-3">
              <input type="text" name="firstName" class="form-control" id="profilFirstName" value="<?php echo $_POST['firstName']; ?>" disabled>
            </div>
            <div class="mb-3">
              <input type="text" name="lastName" class="form-control" id="profilLastName" value="<?php echo $_POST['lastName']; ?>" disabled>
            </div>
          </form>
          <div class="text-center mb-3">
            <button type="" class="btn btn-primary align-item-end" id="modifyDataButton" onclick="modifyMyData()">Modify my data</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require 'components/footer.html' ?>
</body>


</html>

<script>
  // We modify data from the form in navBarConnectedForm
  // and also change its action attribute. So when the button myProfil (now called Go Bakc) is clicked, it sends the form with the correct data
  document.getElementById("myProfilButton").innerHTML = "Go back";
  document.getElementById("email").setAttribute('value', "<?php echo $_POST['email']; ?>");
  document.getElementById("password").setAttribute('value', "<?php echo $_POST['password']; ?>");
  document.getElementById("firstName").setAttribute('value', "<?php echo $_POST['firstName']; ?>");
  document.getElementById("lastName").setAttribute('value', "<?php echo $_POST['lastName']; ?>");
  document.getElementById("form").action = "landing.php";

  function modifyMyData() {
    document.getElementById("profilEmail").disabled = false;
    document.getElementById("profilPassword").disabled = false;
    document.getElementById("profilFirstName").disabled = false;
    document.getElementById("profilLastName").disabled = false;
    document.getElementById("modifyDataButton").innerHTML = "Send";
    document.getElementById("modifyDataButton").onclick = function() {
      document.getElementById("profilForm").submit(); // SUBMIT FORM
    };
  }
</script>