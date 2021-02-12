<?php

$storage = new Account();

if (isset($_POST['name'])) {
    if($storage->login($_POST['name'], $_POST['password']))
    {
        header('Location: '.'../sites/profil.php');
    }
}