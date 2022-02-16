<?php $tittle = "MyWine"; ?>
<?php $alert = NULL; ?>

<?php ob_start(); ?>
<div class="text-center pt-3 pb-5">
    <h2>All of our wines</h2>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Filter our products</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php?action=filterProduct" id="filterForm">
                    <div class="mb-3">
                        <label for="subCategorySelected" class="form-label">By category</label>
                        <select name="subCategorySelected" class="form-select" form="filterForm">
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
                        <input type="hidden" name="email" class="form-control" id="productName" value="<?= $myProfil['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="password" class="form-control" id="productName" value="<?= $myProfil['password'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center">
            <div class="row justify-content-center">
                <?php
                $numberOfProducts = 0;
                foreach ($allProducts as $product) {
                ?>
                    <div class="card me-4 mb-4" style="width: 18rem;">
                        <img src="public/images/myWineIcon.png" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $product['Name']; ?></h5>
                            <p class="card-text"><?= $product['Description']; ?></p>
                            <button type="button" class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="<?= "#exampleModal" . $numberOfProducts ?>">
                                Know more
                            </button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="<?= "exampleModal" . $numberOfProducts ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?= $product['Name']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 mb-5">
                                                <img src="public/images/myWineIcon.png" class="card-img-top" alt="...">
                                            </div>
                                            <div class="col-12">
                                                <form method="post" action="index.php?action=orderProduct" id="<?= "quantityForm" . $numberOfProducts ?>">
                                                    <div class="mb-3">
                                                        <label for="productName" class="form-label"><strong>Name</strong></label>
                                                        <input type="text" name="productName" class="form-control" id="productName" value="<?= $product['Name']; ?>" readonly="readonly">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="productDescription" class="form-label"><strong>Description</strong></label>
                                                        <input type="text" name="productDescription" class="form-control" id="productDescription" value="<?= $product['Description']; ?>" readonly="readonly">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="productUnitPrice" class="form-label"><strong>Price per unit</strong></label>
                                                        <input type="text" name="productUnitPrice" class="form-control" id="productUnitPrice" value="<?= $product['UnitPrice']; ?>" readonly="readonly">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="productUploadDate" class="form-label"><strong>In stock since</strong></label>
                                                        <input type="text" name="productUploadDate" class="form-control" id="productUploadDate" value="<?= $product['UploadDate']; ?>" readonly="readonly">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="numberOfItems" class="form-label"><strong>Quantity</strong></label>
                                                        <select name="numberOfItems" class="form-select" form="<?= "quantityForm" . $numberOfProducts ?>">
                                                            <?php
                                                            if ($product['StockQuantity'] <= 11) {
                                                                for ($lines = 0; $lines <= $product['StockQuantity']; $lines++) {   ?>
                                                                    <option value="<?= $lines; ?>"><?= $lines; ?></option>
                                                                <?php
                                                                }
                                                            } else {
                                                                for ($lines = 0; $lines < 11; $lines++) {   ?>
                                                                    <option value="<?= $lines; ?>"><?= $lines; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="hidden" name="email" class="form-control" id="productName" value="<?= $myProfil['email'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="hidden" name="password" class="form-control" id="productName" value="<?= $myProfil['password'] ?>">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?php if (!empty($email) && !empty($password)) { ?>
                                        <div class="col-md-12 text-center">
                                            <button onclick="quantityForm(<?= $numberOfProducts ?>)" class="btn btn-primary btn-block" data-bs-dismiss="modal">Buy</button>
                                        </div>

                                    <?php
                                    } else { ?>
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary btn-block">You have to be connected to order this</button>
                                        </div>
                                    <?php
                                    }
                                    ?>

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

<script>
    document.getElementById("filterProduct").style.display = "block";

    function quantityForm(numberOfProducts) {
        // alert("quantityForm" + numberOfProducts);
        document.getElementById("quantityForm" + numberOfProducts).submit();
    }
</script>
<?php $content = ob_get_clean(); ?>