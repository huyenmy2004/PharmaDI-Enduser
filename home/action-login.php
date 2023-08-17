<?php
session_start();
require_once "../connect-db.php";
require_once "home-pdo.php";
$account = new Login();
$user = $account->login($_POST['username'], $_POST['pass']);
if(count($user) > 0 ){
    $_SESSION['username'] = $user[0]['username'];
    $_SESSION['cusId'] = $user[0]['cusId'];
    $_SESSION['cartId'] = $user[0]['cartId'];
    $_SESSION['role'] = $user[0]['role'];
    if ($_SESSION['role']==0){
        header("Location: http://localhost/PharmaDI-Enduser/home/home.php");
    }
    if ($_SESSION['role']==1){
        header("Location: http://localhost/PharmaDI-Admin/product/product-list.php");
    }
}
else{
    header("Location: http://localhost/PharmaDI-Enduser/home/home-guest.php");
}