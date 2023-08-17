<?php
    require_once 'home-pdo.php';
    $login = new Login();
    $data = [
        'username' => $_POST['username'],
        'pass' => $_POST['pass'],
        'cusName' => $_POST['cusName'],
        'cusGPP' => $_POST['cusGPP']
    ];
    $login->signUp($data);
    header("Location: http://localhost/PharmaDI-Enduser/home/home-guest.php");
?>