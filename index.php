<?php
require('produits.php');
require('categories.php');

$produit = new Produits(13, 'Produit 13');

$test = $produit->getProduitByID(2);

var_dump($test);

?>