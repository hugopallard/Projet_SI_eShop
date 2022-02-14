<!DOCTYPE html>
<html lang="en">

<?php require 'reusableCode/head.html';



if (isset($_POST['subCategoryName'])) {
    echo $_POST['subCategoryName'];
    echo "Filtered";
    foreach ($_POST['retrievedProduct'] as $retrievedProducts) {
        echo '<tr>';
        echo '  <td>', $retrievedProducts['Name'], '</td>';
        echo '  <td>', $retrievedProducts['Description'], '</td>';
        echo '  <td>', $retrievedProducts['UnitPrice'], '</td>';
        echo '  <td>', $retrievedProducts['UploadDate'], '</td>';
        echo '</tr>';
    }
    echo " TAILLE: " . sizeof($_POST['retrievedProduct']);
} else {
    require 'retrieveProduct.php';
    echo "All products retrieved";
}

if (isset($_POST['userFound']) && $_POST['userFound'] == 1) {
    echo "user connected";
    require 'components/navbarConnected.php';
} else if (isset($_POST['userCreated']) && $_POST['userCreated'] == 1) {
    echo "user created, access to profil granted";
    require 'components/navbarConnected.php';
} else {
    echo "user not connected";
    require 'components/navbarSignIn.html';
}

if (isset($_POST['lastName'])) {
    $lastName = $_POST['lastName'];
    echo $lastName;
}
if (isset($_POST['firstName'])) {
    $firstName = $_POST['firstName'];
    echo $firstName;
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    echo $password;
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    echo $email;
}
if (isset($_POST['userFound'])) {
    $userFound = $_POST['userFound'];
    echo $userFound;
}
if (isset($_POST['userCreated'])) {
    $userCreated = $_POST['userCreated'];
    echo $userCreated;
}

require 'reusableCode/dataForm.php';

?>

<body>

    <div class="text-center pt-3 pb-5">
        <h2>All of our wines</h2>
    </div>
    <div class="offcanvas offcanvas-start text-center" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h3 class="mb-5">Filter our products</h3>
        </div>
        <div class="offcanvas-body">
            <form action="filterProduct.php" method="POST" id="filterForm">
                <div class="mb-3">
                    <label for="selectCategory" class="form-label">By category</label>
                    <select name="selectCategory" class="form-select" form="filterForm">
                        <?php
                        // On affiche chaque recette une à une
                        foreach ($retrieveCategories as $category) {
                        ?>
                            <option value="<?php echo $category['Name']; ?>"><?php echo $category['Name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="row justify-content-center">
                    <?php
                    $numberOfProducts = 0;
                    foreach ($_POST['retrievedProduct'] as $retrievedProduct) {
                    ?>
                        <div class="card me-4 mb-4" style="width: 18rem;">
                            <img src="images/myWineIcon.png" class="card-img-top" alt="...">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $retrievedProduct['Name']; ?></h5>
                                <p class="card-text"><?php echo $retrievedProduct['Description']; ?></p>
                                <button type="button" class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="<?php echo ("#exampleModal" . $numberOfProducts) ?>">
                                    Know more
                                </button>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo ("exampleModal" . $numberOfProducts) ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $retrievedProduct['Name']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="images/myWineIcon.png" class="card-img-top" alt="...">
                                                </div>
                                                <div class="col-6">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <strong>Description: </strong><?php echo $retrievedProduct['Description']; ?>
                                                            </div>
                                                            <div class="col-12">
                                                                <strong>Prix: </strong> <?php echo ($retrievedProduct['UnitPrice'] . " € l'unité"); ?>
                                                            </div>
                                                            <div class="col-12">
                                                                <strong>En stock depuis: </strong><?php echo $retrievedProduct['UploadDate']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btn-block" data-bs-dismiss="modal">Buy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $numberOfProducts++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    document.getElementById("filterProduct").style.display = "block";
</script>

</html>