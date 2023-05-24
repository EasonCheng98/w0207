<?php
    class Frontend extends CI_Controller
    {
        
        public function home()
        {
            $this->load->model("Product_model");

            $arrivalList = $this->Product_model->get_where(array('latest'=>1, ));
            $featuredList = $this->Product_model->get_where(array('featured'=>1, ));
            $topsellList = $this->Product_model->get_where(array('topsell'=>1, ));

            $data = [ 'arrivalList'=>$arrivalList, 'featuredList'=>$featuredList, 'topsellList'=>$topsellList,];

            $this->load->view("header");
            $this->load->view("home",$data);
            $this->load->view("footer");       
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

            $this->load->view("header");
            $this->load->view("product_list", $data);
            $this->load->view("footer");


        }

        public function product_detail($product_id)
        {
            $this->load->view("header");
           
            $this->load->view("footer");
        }
    }

?>