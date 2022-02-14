<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=myeshopprojetsi;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$retrievedProducts = $db->query("SELECT * FROM products");
$retrieveCategories = $db->query("SELECT * FROM subCategories");
