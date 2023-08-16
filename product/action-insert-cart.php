<?php 
require_once "product-pdo.php";
$product = new Product();
$product->insert($_GET['prodId'], $_GET['prodCartNum']);
header("Location: http://localhost/PharmaDI-Enduser/cart/cart-list.php");