<?php

$jokes = new Jokes();

if (isset($_POST['title']) && isset($_POST['joke'])) {
    if (isset($_SESSION['loggedIn']))
    {
        $jokes->addJoke($_POST['title'], $_POST['joke']);
    }
}