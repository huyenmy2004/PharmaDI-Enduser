<?php
 session_start();
 session_destroy();
 header("Location: http://localhost/PharmaDI-Enduser/home/home-guest.php")
?>