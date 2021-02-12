<?php

$storage = new Account();

if (isset($_POST['newName'])) {
    if($storage->checkPassword($_POST['newPassword']) && $storage->checkEmail($_POST['newEmail']))
    {
        $storage->register($_POST['newName'], $_POST['newPassword'], $_POST['newEmail']);
        header('Location: '.'../sites/profil.php');
    }
}
