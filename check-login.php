<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header('location:http://localhost/PharmaDI-Enduser/home/home-guest.php');
}