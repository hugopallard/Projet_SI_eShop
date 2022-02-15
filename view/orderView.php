<?php $tittle = "MyWine"; ?>
<?php $alert = NULL; ?>
<?php ob_start(); ?>

<div class="container">
    <div class="text-center pt-3 pb-5">
        <h1>Summary Page</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <img src="public/images/myWineIcon.png" alt="">
        </div>
        <div class="col-6">
            <form method="post" action="index.php?action=orderConfirmed" id="finalOrderForm">
                <div class="mb-3">
                    <label for="productName" class="form-label"><strong>Name</strong></label>
                    <input type="text" name="productName" class="form-control" id="productName" aria-describedby="emailHelp" value="<?= $productName; ?>" readonly="readonly">
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label"><strong>Description</strong></label>
                    <input type="text" name="productDescription" class="form-control" id="productDescription" value="<?= $productDescription; ?>" readonly="readonly">
                </div>
                <div class="mb-3">
                    <label for="productUnitPrice" class="form-label"><strong>Price per unit</strong></label>
                    <input type="text" name="productUnitPrice" class="form-control" id="productUnitPrice" value="<?= $productUnitPrice; ?>" readonly="readonly">
                </div>
                <div class="mb-3">
                    <label for="productUploadDate" class="form-label"><strong>In stock since</strong></label>
                    <input type="text" name="productUploadDate" class="form-control" id="productUploadDate" value="<?= $productUploadDate; ?>" readonly="readonly">
                </div>
                <div class="mb-3">
                    <label for="numberOfItems" class="form-label"><strong>Quantity ordered</strong></label>
                    <input type="text" name="numberOfItems" class="form-control" id="numberOfItems" value="<?= $numberOfItems; ?>" readonly="readonly">
                </div>
                <div class="mb-5">
                    <label for="email" class="form-label"><strong>My email</strong></label>
                    <input type="text" name="email" class="form-control mb-1" id="email" value="<?= $email ?>" readonly="readonly">
                    <label for="password" class="form-label"><strong>My password</strong></label>
                    <input type="text" name="password" class="form-control" id="password" value="<?= $password ?>" readonly="readonly">
                </div>
            </form>
            <div class="float-end mb-3">
                <h4><strong>Total Price:</strong></h4>
                <h4 class="text-end"><?php echo (($productUnitPrice * $numberOfItems) . "€") ?></h4>
            </div>


        </div>
        <div class="offset-6 col-6 text-center mb-5">
            <button onclick="finalOrder()" class="btn btn-primary pe-5 ps-5 pt-pb-2" id="finalOrder">Order</button>
        </div>
    </div>
</div>

<script>
    function finalOrder() {
        document.getElementById("finalOrderForm").submit();
    }
</script>

<?php $content = ob_get_clean(); ?>