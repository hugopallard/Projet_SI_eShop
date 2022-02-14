<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=myeshopprojetsi;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// On récupère tout le contenu de la table recipes
$subCategoryName = $_POST['selectCategory'];
echo $subCategoryName;
$query = "SELECT products.Name, products.Description, products.UnitPrice, products.UploadDate, subcategories.Name 
FROM products INNER JOIN subcategories ON products.SubCategory_ID = subcategories.id WHERE subcategories.Name = :subCategoryName";

$productStatement = $db->prepare($query);
$productStatement->execute([
    'subCategoryName' => $subCategoryName,
]);
$retrievedProducts = $productStatement->fetchAll();
echo gettype($retrievedProducts);

print_r($retrievedProducts);

?>
<form action="product.php" method="POST" id="goBack">
    <div>
        <input type="hidden" name="subCategoryName" class="form-control" id="subCategoryName" value="<?php echo $subCategoryName; ?>">
    </div>
    <?php
    $i = 0;
    foreach ($retrievedProducts as $retrievedProduct) { ?>
        <div>
            <div>
                <input type="hidden" name="<?php echo "retrievedProduct[" . $i . "][Name]" ?>" class="form-control" id="retrievedProducts" value="<?php echo $retrievedProduct["Name"] ?>">
            </div>
            <div>
                <input type="hidden" name="<?php echo "retrievedProduct[" . $i . "][Description]" ?>" class="form-control" id="retrievedProducts" value="<?php echo $retrievedProduct["Description"] ?>">
            </div>
            <div>
                <input type="hidden" name="<?php echo "retrievedProduct[" . $i . "][UnitPrice]" ?>" class="form-control" id="retrievedProducts" value="<?php echo $retrievedProduct["UnitPrice"] ?>">
            </div>
            <div>
                <input type="hidden" name="<?php echo "retrievedProduct[" . $i . "][UploadDate]" ?>" class="form-control" id="retrievedProducts" value="<?php echo $retrievedProduct["UploadDate"] ?>">
            </div>
        </div>

    <?php
        $i++;
    }
    ?>
</form>

<script>
    document.getElementById("goBack").submit();
</script>