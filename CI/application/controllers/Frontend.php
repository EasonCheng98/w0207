<?php
    class Frontend extends CI_Controller
    {
        private $data = [];

        public function __construct()
        {
            parent::__construct();
            $this->load->model("Product_model");
        }
        
        public function home()
        {
            $this->data['arrivalList'] = $this->Product_model->get_where(array('latest'=>1, ));
            $this->data['featuredList'] = $this->Product_model->get_where(array('featured'=>1, ));
            $this->data['topsellList'] = $this->Product_model->get_where(array('topsell'=>1, ));

            //$data = [ 'arrivalList'=>$arrivalList, 'featuredList'=>$featuredList, 'topsellList'=>$topsellList,];
            //$this->data['arrivalList'] = $arrivalList;
            //$this->data['featuredList'] = $featuredList;
            //$this->data['topsellList'] = $topsellList;
            
            $this->load->view("header");
            $this->load->view("home", $this->data);
            $this->load->view("footer");       
         }


        public function product_list()
        {
            
            $this->$data['productList'] =
            [
                ["id" => "1", "title" => "TV"],
                ["id" => "2", "title" => "HomeCooker"],
            ];

            //$data['productList'] = $productList;
            //$this->$data['productList'] = $productList ;

            $this->load->view("header");
            $this->load->view("product_list", $this->data);
            $this->load->view("footer");


        }

        public function product_detail($product_id)
        {
            
            $this->data['productData'] = $this->Product_model->getOne(array('id'=>$product_id));

            //$data = ['productData' => $productdata];
            //$this->data['productData'] = $productdata ;

            $this->load->view("header");
            $this->load->view("product_detail",$this->data);
            $this->load->view("footer");
        }
    }

?>