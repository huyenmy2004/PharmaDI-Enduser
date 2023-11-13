<?php
require_once "profile-pdo.php";
$profile = new Profile();
$data = [
    'cusName' => $_POST['cusName'],
    'cusContact' => $_POST['cusContact'],
    'cusPhone' => $_POST['cusPhone'],
    'cusAddress' => $_POST['cusAddress'],
    'cusGPP' => $_POST['cusGPP'],
    'cusGPPDate' => $_POST['cusGPPDate'],
    'cusGPPAddr' => $_POST['cusGPPAddr']
];
$profile->update($data);
header("Location: http://localhost/PharmaDI-Enduser/profile/profile.php");

