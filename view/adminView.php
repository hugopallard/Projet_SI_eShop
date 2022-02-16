<?php $tittle = "MyWine"; ?>

<?php ob_start(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-light align-items-center justify-content-center">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                <a href="/" class="d-block p-3 link-dark text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="right">
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link py-3 px-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="fa-solid fa-circle-plus fa-2x" onclick="addProduct()" data-bs-toggle="tooltip" data-bs-placement="top" title="Add a new product"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link py-3 px-2" data-bs-toggle="tooltip" data-bs-placement="right">
                            <i class="fa-solid fa-circle-minus fa-2x" onclick="removeProduct()" data-bs-placement="top" title="Remove a product"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link py-3 px-2" data-bs-toggle="tooltip" data-bs-placement="right">
                            <i class="fa-solid fa-users fa-2x" onclick="manageUsers()" data-bs-placement="top" title="Manage MyWine's users"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm p-3" style="height: 100vh;">
            <!-- content -->
            <div id="default">
                <h2>Welcome to your admin panel !</h2>
                <hr />
                <h5>Select an action on the left...</h5>

            </div>
            <div id="addProduct" style="display: none; height: 100%;">
                <h2>Add a product</h2>
                <hr />
                <h5>Fill the form below to add a new product to MyWine</h5>
                <h6>MySQL addProduct() request in model/frontend.php doesnt work for some reasons</h6>
                <div class="container" style="height: 100%;">
                    <div class="row">
                        <div class="col-12 text-center mt-5">
                            <h5>Your product</h5>
                        </div>
                        <div class="col-12 mt-5">
                            <form method="post" action="index.php?action=addProduct" id="addProductForm">
                                <div class=" mb-3">
                                    <label for="productName" class="form-label"><strong>Name</strong></label>
                                    <input type="text" name="productName" class="form-control" id="productName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label"><strong>Description</strong></label>
                                    <input type="text" name="productDescription" class="form-control" id="productDescription" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productUnitPrice" class="form-label"><strong>Price per unit</strong></label>
                                    <input type="text" name="productUnitPrice" class="form-control" id="productUnitPrice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productUploadDate" class="form-label"><strong>How old ?</strong></label>
                                    <input type="date" name="productUploadDate" class="form-control" id="productUploadDate" required>
                                </div>
                                <div class="mb-3">
                                    <label for="numberOfItems" class="form-label"><strong>How many ?</strong></label>
                                    <input type="text" name="numberOfItems" class="form-control" id="numberOfItems">
                                </div>
                                <div class="mb-3">
                                    <label for="subCategorySelected" class="form-label">By category</label>
                                    <select name="subCategorySelected" class="form-select" form="addProductForm">
                                        <?php
                                        // On affiche chaque recette une à une
                                        foreach ($allSubCategories as $subCategory) {
                                        ?>
                                            <option value="<?= $subCategory['Name']; ?>"><?= $subCategory['Name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="email" class="form-control" id="email" value="<?= $myProfil['email'] ?>">
                                </div>
                                <div class="mb-5">
                                    <input type="hidden" name="password" class="form-control" id="password" value="<?= $myProfil['password'] ?>">
                                </div>
                                <div class="text-center "><button type="submit" class="btn btn-success pe-5 ps-5 pt-2 pb-2">Add</button></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="removeProduct" style="display: none;">
                <h2>Remove Product</h2>
                <hr />
                <h5>Select which product you want to remove...</h5>
                <h6>MySQL request removeProduct() not written yet + form not implemented yet</h6>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center mt-5">
                            <h5>All MyWine Products</h5>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <div class="row justify-content-center">
                                <?php
                                foreach ($allProducts as $product) {
                                ?>
                                    <div class="card me-4 mb-4" style="width: 18rem;">
                                        <img src="public/images/myWineIcon.png" class="card-img-top" alt="...">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title"><?= $product['Name']; ?></h5>
                                            <p class="card-text"><?= $product['Description']; ?></p>
                                            <button type="button" class="btn btn-primary mt-auto">Remove</button>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="manageUsers" style="display: none;">
                <h2>Manage Users</h2>
                <hr />
                <h5>Here you can manage your users...</h5>
                <h6>MySQL request removeUser() not written yet + form not implemented yet</h6>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center mt-5">
                            <h5>All MyWine Products</h5>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <div class="row justify-content-center">
                                <?php
                                foreach ($allUsers as $user) {
                                ?>
                                    <div class="card me-4 mb-4" style="width: 18rem;">
                                        <img src="public/images/myWineIcon.png" class="card-img-top" alt="...">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title"><?= $user['FirstName']; ?></h5>
                                            <p class="card-text"><?= $user['LastName']; ?></p>
                                            <button type="button" class="btn btn-primary mt-auto">Remove</button>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>

<script>
    function addProduct() {
        document.getElementById("default").style.display = "none";
        document.getElementById("addProduct").style.display = "block";
        document.getElementById("removeProduct").style.display = "none";
        document.getElementById("manageUsers").style.display = "none";
    }

    function removeProduct() {
        document.getElementById("default").style.display = "none";
        document.getElementById("addProduct").style.display = "none";
        document.getElementById("removeProduct").style.display = "block";
        document.getElementById("manageUsers").style.display = "none";
    }

    function manageUsers() {
        document.getElementById("default").style.display = "none";
        document.getElementById("addProduct").style.display = "none";
        document.getElementById("removeProduct").style.display = "none";
        document.getElementById("manageUsers").style.display = "block";
    }
</script>
<?php $content = ob_get_clean(); ?>