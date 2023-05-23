<h1>This is Product List</h1>

<?php
    foreach($productList as $v)
    {
        echo 
        $v['id']
        ." <a href='".base_url('product_detail/'.$v['id'])."'> ".
        $v['title']."
        </a><br>";
    }
?>