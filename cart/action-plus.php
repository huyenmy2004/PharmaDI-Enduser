<?php
require_once "../connect-db.php";
require_once "cart-pdo.php";
$cart = new Cart();
$cart->plusNumber($_GET['number'], $_GET['prodId']);
header("Location: http://localhost/PharmaDI-Enduser/cart/cart-list.php");