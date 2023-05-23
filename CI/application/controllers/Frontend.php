<?php
    class Frontend extends CI_Controller
    {
        public function home()
        {
            $this->load->view("home.php");
        }

        public function product_list()
        {
            $data = [];
            $productList =
            [
                ["id" => "1", "title" => "TV"],
                ["id" => "2", "title" => "HomeCooker"],
            ];
            $data['productList'] = $productList;

            $this->load->view("product_list.php", $data);


        }

        public function product_detail($product_id)
        {
            echo "<h1>Product Detail ".$product_id." </h1>";
        }
    }

?>