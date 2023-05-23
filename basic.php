<?php

    //Integer
    $a = 300;


    //Floating
    $f = 0.30;


    //String
    $s = "This is W0207";
    $s = 'This is W0207';


    //Boolean
    $b = true;
    $b = false;


    // Array (PHP 5.4 below)
    $array = array("a","b","c",);
    // Array (PHP 5.4 after) (7.0+)
    $array = ["a","b","c",];


    // Indexed Array
    //               0   1   2   3   4
    $index_array = ["a","b","c","d","e"];
    //extract "c" (拿c出来)
    $target_value = $index_array [2];
    //extract "d" (拿d出来)
    $target_value = $index_array [3];
    // replace "b" => "v"
    $index_array [1] = "v";


    // Associative Array (express object 表达物件)
    $assoc_array = [
        "Ali" => 35,
        "Peter" => 23,
        "Michael" => 10,
    ];
    //Exp: Car
    $car_array = [
        "Brand" => "Honda",
        "Model" => "Jazz",
        "cc"    => "1.5",
        "price" => 80000,
    ];


    //multidimensional array
    //indexarray has assoc array
    $class = [
        /* 0=>*/ ["name" => "Ali", "Money"=> 8],
        /* 1=>*/ ["name" => "Peter", "Money"=> 8],

    ];
    //  Assoc array has Index array
    $car_array = [
        "Brand" => "Honda",
        "Model" => "Jazz",
        "cc"    => "1.5",
        "price" => 80000,
        "member" => array("ali","peter","Ahkaw")
    ];


    //Operators (运算子)
    // + — * /
    // . （String concatenate）
    $a = 1;
    $b = 2;
    $c = $a + $b; // Ans: 3

    $d = "This is apple";
    $e = "This is orange";
    $f = $d . "" . $e; // Ans: This is apple This is orange


    //Expression 
    //(if...else)
    $a = 50;
    $b = 100;
    if($a > 100 && $b < 100)
    {
        echo "Large";
    }else{
        echo "smaller";
    }

    // For/Foreach, Iteration
    for($i=0; $i<=100; $i++){
        echo $i;
    }

    foreach($car_array as $k=>$v){
        echo $k."".$v;
    }

    //while
    while(true){

    }


    //count
    echo count($class); // Ans: 2


    //debug
    //string
    echo $class;
    // array
    print_r($class);
    var_dump($class);

    
    // date 2023-5-23 10:26:00
    echo date("Y-m-d H:i:s");
    // time() is unix timestamp
    // 1970-01-01 00:00:00 until now
    echo time();
    echo date("Y-m-d H:i:s",time()+24*3600);


    // PHP Object
    // Class 是魔法书 里面有Dragon
    class Dragon{

    }
    // new 是召唤Dragon出来 它就变实体了 它就是$d了
    $d = new Dragon







?>
