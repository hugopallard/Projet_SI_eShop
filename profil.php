<!DOCTYPE html>
<html lang="en">

<!-- code for the icons of danger / sucess alerts -->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
  </symbol>
</svg>

<!-- require the head -->
<?php require 'reusableCode/head.html' ?>

<body>
  <?php
  // If users's data were modified
  if (isset($_POST['dataModified'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hasBeenShowed = $_POST['hasBeenShowed'];
    $userFound = $_POST['userFound'];
    $currentPage = $_POST['currentPage'];
    $dataModified = $_POST['dataModified'];
    // We require the dataForm which data will change with the new ones above
    // This form is triggered by the button inside navbarConnected.php
    // The form is currently pointing toward profil.php, but JS below make it point toward landing.php
    require 'reusableCode/dataForm.php';
    // We require the correct navbar
    require 'components/navbarConnected.php';

    // If there has been an error (null field)
    if ($_POST['dataModified'] == 0) { ?>
      <!-- An danger alert shown if there was ISSUES modifying the data of the user -->
      <div class="alert alert-danger alert-dismissible fade show text-center m-0" role="alert" id="issue">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
          <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <strong>Data were not modified. Please do not enter a null value</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      // If they were successfully modified  
    } else {
    ?>
      <!-- An sucess alert shown if there was NO ISSUES modifying the data of the user -->
      <div class="alert alert-success  alert-dismissible fade show text-center m-0" role="alert" id="success">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
          <use xlink:href="#check-circle-fill" />
        </svg>
        <strong>Data modified successfully</strong> <?php echo ($firstName . ' ' . $lastName . ' !'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  <?php
    }
  }
  // Else data arent modified
  else {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (isset($_POST['userFound'])) {
      $userFound = $_POST['userFound'];
    } else if (isset($_POST['userCreated'])) {
      $userCreated = $_POST['userCreated'];
    }
    $hasBeenShowed = $_POST['hasBeenShowed'];
    $currentPage = $_POST['currentPage'];
    $dataModified = 0;
    // We require the dataForm which data will change with the new ones above
    // This form is triggered by the button inside navbarConnected.php
    // The form is currently pointing toward profil.php, but JS below make it point toward landing.php
    require 'reusableCode/dataForm.php';
    // We require the correct navbar
    require 'components/navbarConnected.php';
  }
  ?>

  <!-- the content of the profil page -->

  <div id="profilContent">

    <div class="vh-100">
      <div class="row">
        <div class="col-12 text-center pt-5 ">
          <h1>My profil</h1>
        </div>
        <div class="col-6 text-center align-items-center justify-content-center ">
          <img src="images/myWineIcon.png" alt="">
        </div>
        <div class="col-6 d-flex align-items-center justify-content-center ">
          <form method="post" action="modifyData.php" id="profilForm">
            <div class="mb-3 form-control-sm">
              <input type="email" name="profilEmail" class="form-control" id="profilEmail" aria-describedby="emailHelp" value="<?php echo $email; ?>" disabled>
            </div>
            <div class="mb-3 form-control-sm">
              <input type="password" name="profilPassword" class="form-control" id="profilPassword" value="<?php echo $password; ?>" disabled>
            </div>
            <div class="mb-3 form-control-sm">
              <input type="text" name="profilFirstName" class="form-control" id="profilFirstName" value="<?php echo $firstName; ?>" disabled>
            </div>
            <div class="mb-3 form-control-sm">
              <input type="text" name="profilLastName" class="form-control" id="profilLastName" value="<?php echo $lastName; ?>" disabled>
            </div>
            <div>
              <input type="hidden" name="hasBeenShowed" class="form-control" id="hasBeenShowed" value="<?php echo $hasBeenShowed; ?>">
            </div>
            <div>
              <input type="hidden" name="userFound" class="form-control" id="userFound" value="<?php echo $userFound; ?>">
            </div>
            <div>
              <input type="hidden" name="currentPage" class="form-control" id="currentPage" value="<?php echo $currentPage; ?>">
            </div>
            <div>
              <input type="hidden" name="dataModified" class="form-control" id="dataModified" value="<?php echo $dataModified; ?>">
            </div>
            <div class="text-center">
              <button type="button" class="btn btn-primary align-item-end" id="modifyDataButton" onclick="modifyMyData()">Modify my data</button>
            </div>
          </form>

        </div>
      </div>

    </div>

  </div>
  <!-- and we also require the footer -->
  <?php require 'components/footer.html'; ?>
</body>



</html>

<script>
  // We change the style.display of the profil button to NONE, no need to display it on profil.php
  document.getElementById("myProfilButton").style.display = "none";
  // We change the action attribute of the dataForm
  document.getElementById("dataForm").action = "<?php echo $currentPage; ?>";

  function modifyMyData() {
    document.getElementById("profilEmail").disabled = false;
    document.getElementById("profilPassword").disabled = false;
    document.getElementById("profilFirstName").disabled = false;
    document.getElementById("profilLastName").disabled = false;
    document.getElementById("modifyDataButton").innerHTML = "Send";
    // We send the form if the button is clicked one more time
    document.getElementById("modifyDataButton").onclick = function() {
      document.getElementById("profilForm").submit(); // SUBMIT FORM
    };
  }
</script>