<?php
    require_once 'cart-pdo.php';
    $cart = new Cart();
    $listProd = $cart->getData();

    $data = [
        'orderId' => 'order'.$cart->totalOrder()['total'],
        'note' => $_POST['note']
    ];
    $cart->insertOrder($data, $listProd);   
    header("Location: http://localhost/PharmaDI-Enduser/order/order-list.php?status=0");
?>