<?php

$storage = new Account();

if (isset($_POST['title']) && isset($_POST['joke'])) {
    if (isset($_SESSION['loggedIn']))
    {
        $storage->addJokes($_POST['title'], $_POST['joke']);
    }
}