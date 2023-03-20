<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../../models/User.php';
 if(isset($_SESSION['user'])){
    $user = unserialize($_SESSION['user']);
   //  var_dump(unserialize($_SESSION['user']));
    echo "welcome ". $user->getFullname();
 }

echo "<h1>Homepage!</h1>";

include __DIR__ . '/../footer/footer.php';
