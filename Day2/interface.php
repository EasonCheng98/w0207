<?php

    interface IHero
    {
        public function walk();
        public function showSuperPower();
    }

    interface ICountable
    {
        public function showCount();
    
    }

    class Superman implements IHero
    {
        public function walk()
        {
            echo "(Fly....)";
        }

        public function showSuperPower()
        {
            echo "(Eye Beam....)";
        }

        public function showCount()
        {
            echo "1,2,3.....";
        }
    }
    


?>