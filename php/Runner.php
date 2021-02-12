<?php

require "Storage.php";
require "Jokes.php";

class Runner
{

    /**
     * táto funkcia je primárna pri AJAX volaniach, podľa poslanej q (query) vieme posúdiť o aký typ požiadavky ide
     */
    function run()
    {
        $jokes = new Jokes();

        $q = $_GET['q'];

        if($q == "1")
        {
            $jokes->showMyJokes();
        }
        else if ($q == "2")
        {
            $jokes->showAllJokes();
        }
        else if ($q=="3")
        {
            $j=$_GET['j'];

            $jokes->addLike($j);
        }
        else
        {
            $jokes->search($q);
        }
    }
}