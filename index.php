<?php
require('controller/frontend.php');
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'signIn':
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $myProfil = signInControl($_POST['email'], $_POST['password']);
            } else {
                echo "Encountered an error while trying to connect to your account [Hello from routeur]";
            }
            // echo "signIn: " . $_POST['email'];
            // echo "signIn: " . $_POST['password'];
            break;
        case 'signUp':
            // echo "waaa: " . $_GET['action'];
            if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['birthDate'])) {
                // echo "creation: " . $_POST['email'];
                // echo "creation: " . $_POST['password'];
                // echo "creation: " . $_POST['firstName'];
                // echo "creation: " . $_POST['lastName'];
                // echo "creation: " . $_POST['birthDate'];
                $myProfil = signUpControl($_POST['email'], $_POST['password'], $_POST['firstName'], $_POST['lastName'], $_POST['birthDate']);
            } else {
                echo "Encountered an error while trying to create your account [Hello from routeur]";
            }
            break;
        case 'profil':
            // echo "profil: " . $_POST['email'];
            // echo "profil: " . $_POST['password'];
            if (isset($_POST['email']) && isset($_POST['password'])) {
                profilControl($_POST['email'], $_POST['password']);
            } else {
                echo "Encountered an error while trying to go to your profil [Hello from routeur]";
            }
            break;
        case 'modifyUser':
            // echo "profil: " . $_POST['email'];
            // echo "profil: " . $_POST['password'];
            if (isset($_POST['profilEmail']) && isset($_POST['profilPassword']) && isset($_POST['profilFirstName']) && isset($_POST['profilLastName'])) {
                modifyUserControl($_POST['profilEmail'], $_POST['profilPassword'], $_POST['profilFirstName'], $_POST['profilLastName']);
            } else {
                echo "Encountered an error while trying to go to your profil [Hello from routeur]";
            }
            break;
        case 'productLoading':
            // echo "product: " . $_POST['email'];
            // echo "product: " . $_POST['password'];
            if (isset($_POST['email']) && isset($_POST['password'])) {
                productLoadingControl($_POST['email'], $_POST['password']);
            } else {
                echo "Encountered an error while trying to load the products [Hello from routeur]";
            }
            break;
        case 'filterProduct':
            //echo $_POST['subCategorySelected'];
            echo $_POST['email'];
            print $_POST['password'];
            if (isset($_POST['subCategorySelected'])) {
                filterProductControl($_POST['subCategorySelected'], $_POST['email'], $_POST['password']);
            } else {
                echo "Encountered an error while trying to filter some products [Hello from routeur]";
            }
            break;
        case 'orderProduct':
            // echo "order: " . $_POST['productName'];
            // echo "order: " . $_POST['productDescription'];
            // echo "order: " . $_POST['productUnitPrice'];
            // echo "order: " . $_POST['productUploadDate'];
            // echo "order: " . $_POST['numberOfItems'];
            if (isset($_POST['productName']) && isset($_POST['productDescription']) && isset($_POST['productUnitPrice']) && isset($_POST['productUploadDate']) && isset($_POST['numberOfItems']) && isset($_POST['email']) && isset($_POST['password'])) {
                orderProductControl($_POST['productName'], $_POST['productDescription'], $_POST['productUnitPrice'], $_POST['productUploadDate'], $_POST['numberOfItems'], $_POST['email'], $_POST['password']);
            } else {
                echo "Encountered an error while trying to go to orderProduct [Hello from routeur]";
            }
            break;
        case 'orderConfirmed':
            // echo "orderConfirmed: " . $_POST['productName'];
            // echo "orderConfirmed: " . $_POST['productDescription'];
            // echo "orderConfirmed: " . $_POST['productUnitPrice'];
            // echo "orderConfirmed: " . $_POST['productUploadDate'];
            // echo "orderConfirmed: " . $_POST['numberOfItems'];
            // echo "orderConfirmed: " . $_POST['email'];
            // echo "orderConfirmed: " . $_POST['password'];
            if (isset($_POST['productName']) && isset($_POST['productDescription']) && isset($_POST['productUnitPrice']) && isset($_POST['productUploadDate']) && isset($_POST['numberOfItems']) && isset($_POST['email']) && isset($_POST['password'])) {
                confirmedOrderControl($_POST['productName'], $_POST['productDescription'], $_POST['productUnitPrice'], $_POST['productUploadDate'], $_POST['numberOfItems'], $_POST['email'], $_POST['password']);
            } else {
                echo "Encountered an error while trying to go to orderProduct [Hello from routeur]";
            }
            break;
        case 'addProduct':
            // echo "addProduct: " . $_POST['productName'];
            // echo "  addProduct: " . $_POST['productDescription'];
            // echo "  addProduct: " . $_POST['productUnitPrice'];
            // echo "  addProduct: " . $_POST['numberOfItems'];
            // echo "  addProduct: " . $_POST['productUploadDate'];
            // echo "  addProduct: " . $_POST['email'];
            // echo "  addProduct: " . $_POST['password'];
            // echo "  addProduct: " . $_POST['subCategorySelected'];
            if (isset($_POST['productName']) && isset($_POST['productDescription']) && isset($_POST['productUnitPrice']) && isset($_POST['numberOfItems']) && isset($_POST['productUploadDate'])  && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['subCategorySelected'])) {
                addProductControl($_POST['productName'], $_POST['productDescription'], $_POST['productUnitPrice'], $_POST['productUploadDate'], $_POST['numberOfItems'], $_POST['email'], $_POST['password'], $_POST['subCategorySelected']);
            } else {
                echo "Encountered an error while trying to add a product [Hello from routeur]";
            }
        case 'landingPage':
            landingPage();
            break;
    }
} else {
    landingPage();
}
