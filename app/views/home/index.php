<?php
session_start();
include __DIR__ . '/../header.php';
 if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    echo "welcome $user[1]";
 }

echo "<h1>Homepage!</h1>";

include __DIR__ . '/../footer/footer.php';
