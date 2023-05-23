<?php
    //multidimensional array
    $a = array(
        0 => array("id"=>1, "title"=>"Iphone", "price"=>3600) ,
        1 => array("id"=>2, "title"=>"Samsung", "price"=>2500) ,
        2 => array("id"=>3, "title"=>"HTC", "price"=>1566) ,
    );

    print_r($a);

    // How to insert an Huawei into array ?
    // [] is push data into array
    $a[] = ["id"=>4, "title"=>"Huawei", "price"=>2600];
    print_r($a);


?>
