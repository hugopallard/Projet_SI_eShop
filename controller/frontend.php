<?php

require('model/frontend.php');


$loggedInfo = array();

function landingPage()
{
    $req = getMostRecentProduct();

    require('view/navbarSignInView.php');
    require('view/indexView.php');
    require('view/footerView.php');
}

function signInControl($email, $password)
{
    $myProfil = signIn($email, $password);
    $req = getMostRecentProduct();
    if ($myProfil['userType'] == "admin") {
        // On se connecte en tant qu'administrateur
        $allProducts = productLoading();
        $allSubCategories = subCategoriesLoading();
        $allUsers = usersLoading();
        require('view/navbarConnectedView.php');
        require('view/admin/welcomeAdminView.php');
        require('view/adminView.php');
        require('view/footerView.php');
    } else if ($myProfil === false || $req === false) {
        // Erreur Impossible de connecter le compte / de charger les 3 produits récents
        require('view/navbarSignInView.php');
        require('view/alerts/account/accountFailure/connectFailureView.php');
        require('view/indexView.php');
        require('view/footerView.php');
    } else {
        // Tout est ok;
        require('view/navbarConnectedView.php');
        require('view/alerts/account/accountSuccess/connectSuccessView.php');
        require('view/indexView.php');
        require('view/footerView.php');
    }
}
function signUpControl($email, $password, $firstName, $lastName, $birthDate)
{
    $myProfil = signUp($email, $password, $firstName, $lastName, $birthDate);
    $req = getMostRecentProduct();
    if ($myProfil === false || $req === false) {
        require('view/navbarSignInView.php');
        require('view/alerts/account/accountFailure/creatingAccountFailureView.php.php');
        require('view/indexView.php');
        require('view/footerView.php');
    } else {
        $myProfil['email'] = $email;
        $myProfil['password'] = $password;
        require('view/navbarConnectedView.php');
        require('view/alerts/account/accountSuccess/welcomeNewUserView.php');
        require('view/indexView.php');
        require('view/footerView.php');
    }
}
function profilControl($email, $password)
{
    $myProfil = profil($email, $password);
    require('view/navbarConnectedView.php');
    require('view/profilView.php');
    require('view/footerView.php');
}
function modifyUserControl($email, $password, $firstName, $lastName)
{
    modifyMyData($email, $password, $firstName, $lastName);
    $myProfil = profil($email, $password);
    $myProfil['email'];
    $myProfil['password'];
    $myProfil['firstName'];
    $myProfil['lastName'];
    require('view/navbarConnectedView.php');
    require('view/profilView.php');
    require('view/footerView.php');
}
function productLoadingControl($email, $password)
{
    $allProducts = productLoading();
    $allSubCategories = subCategoriesLoading();
    $myProfil['email'] = $email;
    $myProfil['password'] = $password;
    if (!empty($email) && !empty($password)) {
        require('view/navbarConnectedView.php');
        require('view/productView.php');
        require('view/footerView.php');
    } else {
        require('view/navbarSignInView.php');
        require('view/productView.php');
        require('view/footerView.php');
    }
}
function filterProductControl($subCategorySelected, $email, $password)
{
    $allProducts = filterProductLoading($subCategorySelected);
    $allSubCategories = subCategoriesLoading();
    if (!empty($email) && !empty($password)) {
        require('view/navbarConnectedView.php');
        require('view/productView.php');
        require('view/footerView.php');
    } else {
        require('view/navbarSignInView.php');
        require('view/productView.php');
        require('view/footerView.php');
    }
}
function orderProductControl($productName, $productDescription, $productUnitPrice, $productUploadDate, $numberOfItems, $email, $password)
{
    if (!empty($email) && !empty($password)) {
        $myProfil['email'] = $email;
        $myProfil['password'] = $password;
        require('view/navbarConnectedView.php');
        require('view/orderView.php');
        require('view/footerView.php');
    } else {
        require('view/navbarSignInView.php');
        require('view/orderView.php');
        require('view/footerView.php');
    }
}
function confirmedOrderControl($productName, $productDescription, $productUnitPrice, $productUploadDate, $numberOfItems, $email, $password)
{

    $productOrderedDetail = confirmOrder($productName, $productDescription, $productUnitPrice, $productUploadDate, $numberOfItems, $email, $password);
    $myProfil['email'] = $email;
    $myProfil['password'] = $password;
    $req = getMostRecentProduct();
    if ($productOrderedDetail === false || $req === false) {
        require('view/navbarConnectedView.php');
        require('view/order/orderFailure/orderFailureView.php');
        require('view/indexView.php');
        require('view/footerView.php');
    } else {
        require('view/navbarConnectedView.php');
        require('view/order/orderSuccess/orderSuccessView.php');
        require('view/indexView.php');
        require('view/footerView.php');
    }
}
function addProductControl($productName, $productDescription, $productUnitPrice, $productUploadDate, $numberOfItems, $email, $password, $subCategorySelected)
{
    $allSubCategories = subCategoriesLoading();
    $addProduct = addProduct($productName, $productDescription, $productUnitPrice, $productUploadDate, $numberOfItems, $subCategorySelected);
    if (!empty($email) && !empty($password)) {
        $myProfil['email'] = $email;
        $myProfil['password'] = $password;
        require('view/navbarConnectedView.php');
        require('view/admin/product/productSuccessphp/addProductSuccess.php');
        require('view/adminView.php');
        require('view/footerView.php');
    } else if ($addProduct === false) {
        require('view/navbarConnectedView.php');
        require('view/admin/product/productFailure/addProductFailure.php');
        require('view/adminView.php');
        require('view/footerView.php');
    }
}
