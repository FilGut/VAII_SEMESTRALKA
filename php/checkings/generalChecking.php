<?php

$storage = new Account();

if(isset($_SESSION['loggedIn'])){
    echo '../style/loggedIn.css';
}else{
    echo '../style/styl.css';
}

if (isset($_POST['logout'])) {
    $storage->logout();
    header('Location: '.'../sites/vtipy.php');
}