<?php

$storage = new Account();

if (isset($_POST['newName'])) {
    if (isset($_SESSION['loggedIn']))
    {
        if(!empty($_POST['newPassword']))
        {
            if($storage->checkPassword($_POST['newPassword']))
            {
                $storage->changePassword($_POST['newPassword']);
            }
        }

        if(!empty($_POST['newEmail']))
        {
            if($storage->checkEmail($_POST['newEmail']))
            {
                $storage->changeEmail($_POST['newEmail']);
            }
        }

        if(!empty($_POST['newName']))
        {
            $storage->changeName($_POST['newName']);
        }
    }
}

if(array_key_exists('button1', $_POST)) {
    $storage->deleteMe();
}
