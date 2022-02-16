<?php

function getMostRecentProduct()
{
    $bdd = bddConnect();
    $req = $bdd->query("SELECT * FROM `products` ORDER BY `products`.`UploadDate` DESC LIMIT 3");

    return $req;
}
function signIn($email, $password)
{
    $bdd = bddConnect();
    $connectUser = $bdd->prepare("SELECT firstName, lastName, email, password, userType FROM users WHERE email = :email AND password = :password LIMIT 1");

    $connectUser->execute([
        'email' => $email,
        'password' => $password,
    ]);
    $connectedUser = $connectUser->fetch();

    return $connectedUser;
}
function signUp($email, $password, $firstName, $lastName, $birthDate)
{
    $bdd = bddConnect();
    $newUser = $bdd->prepare("INSERT INTO users(FirstName, LastName, BirthDate, Email, Password) VALUES (:firstName, :lastName, :birthDate, :email, :password)");

    $newUser = $newUser->execute([
        'firstName' => $firstName,
        'lastName' => $lastName,
        'birthDate' => $birthDate,
        'email' => $email,
        'password' => $password,
    ]);
    return $newUser;
}
function profil($email, $password)
{
    $bdd = bddConnect();
    $profilUser = $bdd->prepare("SELECT firstName, lastName, email, password FROM users WHERE email = :email AND password = :password LIMIT 1");

    $profilUser->execute([
        'email' => $email,
        'password' => $password,
    ]);
    $myProfil = $profilUser->fetch();

    return $myProfil;
}
function modifyMyData($email, $password, $firstName, $lastName)
{
    $bdd = bddConnect();
    $modifyDataUser = $bdd->prepare('UPDATE users SET Email = :email, Password = :password, FirstName = :firstName, LastName = :lastName WHERE Email = email AND Password = :password');

    $modifyDataUser->execute([
        'email' => $email,
        'password' => $password,
        'firstName' => $firstName,
        'lastName' => $lastName,
    ]);
    $modifyUser = $modifyDataUser->fetch();

    return $modifyUser;
}
function productLoading()
{
    $bdd = bddConnect();
    $retrievedProducts = $bdd->query("SELECT * FROM products");

    return $retrievedProducts;
}
function subCategoriesLoading()
{
    $bdd = bddConnect();
    $retrieveCategories = $bdd->query("SELECT * FROM subCategories");

    return $retrieveCategories;
}
function usersLoading()
{
    $bdd = bddConnect();
    $retrieveUsers = $bdd->query("SELECT * FROM users");

    return $retrieveUsers;
}
function filterProductLoading($subCategorySelected)
{
    $bdd = bddConnect();
    if ($subCategorySelected != "AllProducts") {
        $selectedProducts = $bdd->prepare("SELECT products.Name, products.Description, products.UnitPrice, products.UploadDate, products.StockQuantity, subcategories.Name 
    FROM products INNER JOIN subcategories ON products.SubCategory_ID = subcategories.id WHERE subcategories.Name = :subCategoryName");
    } else {
        $selectedProducts = $bdd->query("SELECT * FROM products");
    }

    $selectedProducts->execute([
        'subCategoryName' => $subCategorySelected,
    ]);

    return $selectedProducts;
}
function confirmOrder($productName, $productDescription, $productUnitPrice, $productUploadDate, $numberOfItems, $email, $password)
{
    $bdd = bddConnect();
    // echo $email;
    // echo $password;
    $totalPrice = $productUnitPrice * $numberOfItems;
    // echo $totalPrice;

    $userID = $bdd->prepare("SELECT id FROM users WHERE Email = :email AND Password = :password");
    $userID->execute([
        'email' => $email,
        'password' => $password
    ]);
    $userID = $userID->fetch();
    // print_r($userID);
    // echo "COUCOU:   " . ($userID['id']);

    $subCategory = $bdd->prepare("SELECT subcategories.id, subcategories.Category_ID FROM products INNER JOIN subcategories ON products.SubCategory_ID = subcategories.id WHERE products.Name = :productName");
    $subCategory->execute([
        'productName' => $productName,
    ]);
    $subCategory = $subCategory->fetch();
    // print_r($subCategory);
    // echo ($subCategory['id']);
    // echo ($subCategory['Category_ID']);

    $productOrderedDetail = $bdd->prepare("INSERT INTO orderdetail(Product_Name, QuantityOrdered, PriceOfProduct, Category_ID, SubCategory_ID) VALUES  (:productName, :quantityOrdered, :priceOfProduct, :categoryID, :subCategory)");
    $productOrderedDetail->execute([
        'productName' => $productName,
        'quantityOrdered' => $numberOfItems,
        'priceOfProduct' => $productUnitPrice,
        'categoryID' => $subCategory['Category_ID'],
        'subCategory' => $subCategory['id'],
    ]);

    $orderDetail = $bdd->prepare("SELECT * FROM orderdetail WHERE Product_Name = :productName AND QuantityOrdered = :quantityOrdered");
    $orderDetail->execute([
        'productName' => $productName,
        'quantityOrdered' => $numberOfItems
    ]);
    $orderDetail = $orderDetail->fetch();

    // echo "ID: " . $userID['id'];
    // echo "  NUMBER: " . $numberOfItems;
    // echo "  TOTAL PRICE: " . $totalPrice;

    // I dont know why it doesnt insert the order general informations inside the "order" table.
    // Values gathered are corrects, fields names are correct and masks as well.
    // !!! user echo debug above !!!

    $productOrder = $bdd->prepare("INSERT INTO orders(User_ID, OrderDetail_ID, OrderTotalPrice) VALUES  (:userID, :orderDetailID, :orderTotalPrice)");
    $productOrder->execute([
        'userID' => $userID['id'],
        'orderDetailID' => $numberOfItems,
        'orderTotalPrice' => $totalPrice,
    ]);

    return $orderDetail;
}
function addProduct($productName, $productDescription, $productUnitPrice, $productUploadDate, $numberOfItems, $subCategorySelected)
{
    $bdd = bddConnect();
    // echo $productName;
    // echo $productDescription;
    // echo $productUnitPrice;
    // echo $productUploadDate;
    // echo $numberOfItems;
    // echo $subCategorySelected;

    // I dont know why it doesnt insert the order general informations inside the "products" table.
    // Values gathered are corrects, fields names are correct and masks as well.
    // !!! user echo debug above !!!

    // it is formatted differently than above similar issue, but this is how the request is created when Inserting manually into phpMyAdmin.

    $addProduct = $bdd->prepare("INSERT INTO `products` (`Name`, `SubCategory_ID`, `StockQuantity`, `UnitPrice`, `Description`, `UploadDate`) VALUES (:name, :subCategoryID, :stockQuantity, :unitPrice, :description, :uploadDate)");
    $addProduct->execute([
        'name' => $productName,
        'subCategoryID' => $subCategorySelected,
        'stockQuantity' => $numberOfItems,
        'unitPrice' => $productUnitPrice,
        'description' => $productDescription,
        'uploadDate' => $productUploadDate,
    ]);

    $addProduct = $addProduct->fetch();

    return $addProduct;
}

function bddConnect()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=myeshopprojetsi;charset=utf8', 'root', 'root');
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
