<?php

if (isset($_POST['jokeName'])) {
    if (isset($_SESSION['loggedIn']))
    {
        if(!empty($_POST['jokeName']))
        {
            $storage = new Jokes();
            if($storage->deleteJoke($_POST['jokeName']) == true)
            {
                header('Location: '.'../sites/textVtipy.php');
            }

        }

        if(!empty($_POST['userName']))
        {
            $storage = new Account();
            if($storage->deleteUser($_POST['userName']) == true)
            {
                header('Location: '.'../sites/textVtipy.php');
            }
        }
    }
}

