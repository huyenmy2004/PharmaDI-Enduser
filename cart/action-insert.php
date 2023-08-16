<?php
    require_once 'cart-pdo.php';
    $cart = new Cart();
    $data = [
        'prodId' => $_POST['prodId'],
        'prodCartNum' => $_POST['prodCartNum']
    ];
    // $cart->createNewProduct($data);
    // if(isset($_POST['prodImg'])){
    //     $listImg = json_decode($_POST['prodImg'])->{'a'};
    //     $product->insertImg($listImg, $data['prodId']);
    // }
    header("Location: http://localhost/PharmaDI-Enduser/cart/cart-list.php");
?>