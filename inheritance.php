<?php

    class Animal
    {
        public function move()
        {
            echo "(....)";
        }

        protected function crawl()
        {
            this -> move();
        }
    }

    class Lion  extends Animal
    {
        public function lionMove()
        {
            echo "(..^^..)";
        }
    }

    class Tiger extends Animal
    {

    }

    $lion = new Lion();
    $lion -> move();
    $lion -> lionMove();
    echo "<br>";
    $tiger = new Tiger();
    $lion -> move();



?>