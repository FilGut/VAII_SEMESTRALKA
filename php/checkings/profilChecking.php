<?php

$jokes = new Jokes();

if (isset($_POST['title']) && isset($_POST['joke'])) {
    if (strlen($_POST['joke']) <= 255 && strlen($_POST['title']) <= 100)
    {
        if (isset($_SESSION['loggedIn']))
        {
            $jokes->addJoke($_POST['title'], $_POST['joke']);
        }
    }
}