<?php

$storage = new Account();

if(isset($_SESSION['loggedIn'])){
    echo 'loggedIn.css';
}else{
    echo 'styl.css';
}

if (isset($_POST['logout'])) {
    $storage->logout();
    header('Location: '.'vtipy.php');
}