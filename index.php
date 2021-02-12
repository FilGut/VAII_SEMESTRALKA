<?php

//spúšťa sa na vždy na začiatku a vytvára triedu,
//v ktorej sa budú zisťovať požiadavky vytvoreného AJAX volania

require "php/Runner.php";

$runner = new Runner();

$runner->run();