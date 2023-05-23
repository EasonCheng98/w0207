<?php
    include "Game.php";
    include "Animal.php";
    include "Rabbit.php";
    include "Tortoise.php";

    $rabbit = new Rabbit("Roger");
    $tortoise = new Tortoise("David");
    
    $game = new Game();
    $game->takepart($rabbit);
    $game->takepart($tortoise);

    $game->warmup();
    $game->start();
    $game->report();


    


?>