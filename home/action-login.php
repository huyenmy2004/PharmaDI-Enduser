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
    header("Location: http://localhost/PharmaDI-Enduser/home/home.php");
}
else{
    header("Location: http://localhost/PharmaDI-Enduser/home/home-guest.php");
}