<?php   
    class Person {
        public $age = 35;
        public $name = "";
        public $hobby = "";


        //__construct 是参数
        public function __construct($name, $hobby)
        {
            $this->name = $name;
            $this->hobby = $hobby;
        }

        public function greet()
        {
            echo $this->name."Say Hello, He loves to play".$this->hobby;
        }

        public function jump()
        {
            echo "jump";
        }
    }

    //Class -> Object
    $p = new Person("Jason","Basketball");
    $p -> greet();

    $p2 = new Person("David","Badminton");
    $p2 -> greet();
    //$p -> jump();


?>