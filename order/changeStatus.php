<?php

require_once 'pdo.php';
require_once 'helper.php';

$request = $_POST;

$product = [
    'id' => $request['id'],
];

$getinf = new Query();
$getinf->updateStatus($product);
redirectHome();
?>

