<?php
require_once 'cart-pdo.php';
$cart = new Cart();
$listProd = $cart->getData();

$data = [
    'orderId' => 'order' . $cart->totalOrder()['total'],
    'note' => $_POST['note']
];
if ($_SESSION['cusStatus'] == 0)
    $cart->insertOrder($data, $listProd);
else header("Location: http://localhost/PharmaDI-Enduser/cart/cart-list.php");

header("Location: http://localhost/PharmaDI-Enduser/order/order-list.php?status=0");
?>