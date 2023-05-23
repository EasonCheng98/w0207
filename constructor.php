<?php

    class Animal 
    {
        //建构子
        public function __construct()
        {
            echo "Iam a live";
        }

        public function move ()
        {
            echo "(....)";
        }

        //解构字
        public function __destruct()
        {
            echo "Iam a dead";
        }
    }

    $a = new Animal();
    $a -> move();


?>